<?php

namespace Laravel\Spark\Interactions\Settings\Profile;

use Illuminate\Support\Facades\Validator;
// use Laravel\Spark\Events\Profile\ContactInformationUpdated;
use Laravel\Spark\Contracts\Interactions\Settings\Profile\UpdateProfileDetails as Contract;

class UpdateProfileDetails implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function validator($user, array $data)
    {
        return Validator::make($data, [
            'age' => 'required|max:255',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function handle($user, array $data)
    {
        $user->forceFill([
            'age' => $data['age'],
        ])->save();

        event(new ProfileDetailsUpdated($user));

        return $user;
    }
}
