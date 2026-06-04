<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Interview;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreInterviewRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Contracts\Service\Attribute\Required;

class InterviewController extends Controller
{
    use AuthorizesRequests;

    // ─── US10: Formulaire ajout ───────────────────────────────────
    public function create(Application $application): View
    {
        $this->authorize('update', $application);

        return view('interviews.create', [
            'application' => $application,
            'typeLabels' => Interview::TYPE_LABELS,
            'resultLabels' => Interview::RESULT_LABELS,
        ]);
    }

    // ─── US11: Sauvegarde de l'entretien ───────────────────────────
    public function store(StoreInterviewRequest $request, Application $application): RedirectResponse
    {
        $this->authorize('update', $application);

        // Map it explicitly right here before database entry
        $validatedData['scheduled_at'] = $validatedData['datetime'] ?? null;
        unset($validatedData['datetime']);

        $validatedData = $request->validated();

        $application->interviews()->create($validatedData);

        return redirect()->route('applications.show', $application->id)
            ->with('success', 'The interview stage has been added successfully.');
    }

    // ─── US11: Formulaire modification ───────────────────────────

    public function edit(Interview $interview)
    {
        $this->authorize('update', $interview);

        // Make sure these arrays are passed to the view
        $typeLabels = [
            'phone' => 'Phone',
            'video' => 'Video',
            'onsite' => 'Onsite',
            'technical' => 'Technical',
            'hr' => 'HR'
        ];

        $resultLabels = [
            'pending' => 'Pending',
            'passed' => 'Passed',
            'failed' => 'Failed',
            'cancelled' => 'Cancelled'
        ];

        return view('interviews.edit', compact('interview', 'typeLabels', 'resultLabels'));
    }

    // ─── US11: Mise à jour ───────────────────────────────────────

    public function update(StoreInterviewRequest $request, Interview $interview): RedirectResponse
    {
        // Authorize via the InterviewPolicy or Application check
        $this->authorize('update', $interview);

        // 1. Get validated data from the Form Request
        $validatedData = $request->validated();

        // 2. Map 'datetime' form field to 'scheduled_at' database column
        $validatedData['scheduled_at'] = $request->input('datetime') ?? $request->input('scheduled_at');
        unset($validatedData['datetime']);

        // 3. Update the existing interview record
        $interview->update($validatedData);

        return redirect()->route('applications.show', $interview->application_id)
            ->with('success', 'The interview stage has been updated successfully.');
    }

    // ─── US11: Suppression ───────────────────────────────────────

    public function destroy(Interview $interview): RedirectResponse
    {
        $this->authorize('delete', $interview);

        $applicationId = $interview->application_id;
        $interview->delete();

        return redirect()
            ->route('applications.show', $applicationId)
            ->with('success', 'Entretien supprimé.');
    }
}