<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ApplicationController extends Controller
{

    public function getUserStatus(){
        $user_id = auth()->id();

        $status = Application::where('user_id', $user_id)
            ->with('status', 'rejected')
            ->count();


        return view('application.index', ['status']);
    }
    /**
     * Display the dashboard.
     */
    public function dashboard()
    {
        $userId = auth()->id();

        $activeApplications = Application::where('user_id', $userId)
            ->whereNotIn('status', ['refused', 'rejected'])
            ->count();

        $upcomingInterviews = Application::where('user_id', $userId)
            ->where('status', 'interview')
            ->count();

        $totalApps = Application::where('user_id', $userId)->count();
        $pendingApps = Application::where('user_id', $userId)->where('status', 'pending')->count();

        $responseRate = 0;
        if ($totalApps > 0) {
            $answeredApps = $totalApps - $pendingApps;
            $responseRate = round(($answeredApps / $totalApps) * 100);
        }

        // NEW: Fetch the 5 most recent applications to fix the error
        $recentApplications = Application::where('user_id', $userId)
            ->latest() // Orders by created_at DESC
            ->take(3)  // Limits the result to 5 items
            ->get();

        return view('dashboard', [
            'activeApplications' => $activeApplications,
            'upcomingInterviews' => $upcomingInterviews,
            'responseRate' => $responseRate,
            'recentApplications' => $recentApplications, // Pass the variable to the view
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $userId = auth()->id();

        // 1. Récupération des candidatures filtrées pour le tableau
        $query = Application::with('interviews')
            ->where('user_id', $userId)
            ->orderBy('applied_at', 'asc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        $applications = $query->get();

        // 2. CALCUL EXPLICIT DE LA VARIABLE EN ERREUR
        // On compte toutes les candidatures actives (qui ne sont pas refusées ou acceptées)
        $activeApplications = Application::where('user_id', $userId)
            ->whereNotIn('status', ['refused', 'rejected'])
            ->count();

        // 3. Calcul des autres statistiques (pour éviter d'autres erreurs "Undefined variable")
        $upcomingInterviews = Application::where('user_id', $userId)
            ->where('status', 'interview')
            ->count();

        $totalApps = Application::where('user_id', $userId)->count();
        $pendingApps = Application::where('user_id', $userId)->where('status', 'pending')->count();

        $responseRate = 0;
        if ($totalApps > 0) {
            $answeredApps = $totalApps - $pendingApps;
            $responseRate = round(($answeredApps / $totalApps) * 100);
        }
        $currentStatus = $request->status;
        $currentPriority = $request->priority;

        // 2. Récupérer les labels directement depuis le modèle (Optionnel mais plus propre pour compact)
        $statusLabels = Application::STATUS_LABELS;
        $priorityLabels = Application::PRIORITY_LABELS;

        // 3. Renvoyer la vue en utilisant compact()
        return view('applications.index', compact(
            'applications',
            'statusLabels',
            'priorityLabels',
            'currentStatus',
            'currentPriority',
            'activeApplications',
            'upcomingInterviews',
            'responseRate'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('applications.create', [
            'statusLabels' => Application::STATUS_LABELS,
            'priorityLabels' => Application::PRIORITY_LABELS,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        //
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('attachments', 'local');
        }

        $application = Application::create($data);

        return redirect()
            ->route('applications.show', $application)
            ->with('success', 'Candidature créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
        $this->authorize('view', $application);

        return view('applications.show', [
            'application' => $application,
            'interviewTypes' => \App\Models\Interview::TYPE_LABELS,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
        $this->authorize('update', $application);

        return view('applications.edit', [
            'application' => $application,
            'statusLabels' => Application::STATUS_LABELS,
            'priorityLabels' => Application::PRIORITY_LABELS,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //
        $this->authorize('update', $application);

        $validatedData = $request->validated();


        if ($request->hasFile('file')) {
            if ($application->file_path) {
                Storage::disk('local')->delete($application->file_path);
            }
            $validatedData['file_path'] = $request->file('file')->stire('attachment', 'local');
        }


        $application->update($validatedData);

        return redirect()
            ->route('applications.show', $application->id)
            ->with('success', 'Candidature mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
        $this->authorize('delete', $application);

        if ($application->trashed()) {
            $application->forceDelete();

            return redirect()
                ->route('applications.archive')
                ->with('success', 'Candidature définitivement supprimée.');
        }

        $application->delete();

        return redirect()
            ->route('applications.index')
            ->with('success', 'Candidature archivée.');
    }

    public function archive(Request $request)
    {
        $userId = auth()->id();

        $query = Application::onlyTrashed()
            ->where('user_id', $userId)
            ->orderByDesc('deleted_at');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $applications = $query->get();


        return view('applications.archive', [
            'applications' => $applications,
            'statusLabels' => Application::STATUS_LABELS,
            'currentStatus' => $request->status,
        ]);
    }

    public function restore(int $id)
    {
        $application = Application::onlyTrashed()->findOrFail($id);
        $this->authorize('restore', $application);

        $application->restore();

        return redirect()
            ->route('applications.archive')
            ->with('success', 'Candidature restaurée dans votre liste active.');
    }

    public function download(Application $application)
    {
        $this->authorize('view', $application);

        abort_unless($application->file_path, 404);
        abort_unless(Storage::disk('local')->exists($application->file_path), 404);

        return Storage::disk('local')->download($application->file_path);
    }
}
