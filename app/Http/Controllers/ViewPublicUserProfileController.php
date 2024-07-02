<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ViewPublicUserProfileController extends Controller
{
    public function __invoke(Request $request, User $user): View
    {
        dump(today());
        info($user);
        abort_if(auth()->user()->role != 1, 403);
        abort_unless($user->has_enabled_public_profile, Response::HTTP_NOT_FOUND);
        $officeHours = $this->formatHours($user->office_hours);
        $workingHours = $this->formatHours($user->working_hours);

        return view('user-profile-public', [
            'data' => [
                'avatar_url' => $user->getFilamentAvatarUrl(),
                'name' => $user->name,
                'email' => $user->is_email_visible_on_profile ? $user->email : null,
                'phone_number' => $user->is_phone_number_visible_on_profile ? $user->phone_number : null,
                'out_of_office' => $user->out_of_office_is_enabled ? [
                    'starts_at' => $user->out_of_office_starts_at,
                    'ends_at' => $user->out_of_office_ends_at,
                ] : false,
                'bio' => $user->is_bio_visible_on_profile
                    ? $user->bio
                    : null,
                'pronouns' => $user->are_pronouns_visible_on_profile
                    ? $user->pronouns->label
                    : null,
                'timezone' => $user->timezone,
                'office_hours' => $user->office_hours_are_enabled && $officeHours->keys()->count()
                    ? $officeHours
                    : false,
                'appointments_are_restricted_to_existing_students' => $user->appointments_are_restricted_to_existing_students,
                'working_hours' => $user->working_hours_are_enabled
                    && $user->are_working_hours_visible_on_profile && $workingHours->keys()->count()
                    ? $workingHours
                    : false,
            ],
        ]);
    }

    private function formatHours(?array $hours): Collection
    {
        return collect($hours)
            ->filter(fn ($data, $day) => data_get($data, 'enabled'))//Giải nghĩa cách viết???
            ->mapWithKeys(fn ($data, $day) => [//Giải nghĩa cách viết???
                $day => [
                    'starts_at' => data_get($data, 'starts_at'),
                    'ends_at' => data_get($data, 'ends_at'),
                ],
            ]);
    }
}
