<?php

namespace App\Services;

use App\Jobs\SendMail;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserService extends BaseService
{
    protected $userRepository;

    /**
     * __construct
     *
     *
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * updatePassword
     *
     * @param string $email
     *
     * @return [type]
     *
     */
    public function updatePassword(string $email)
    {
        DB::beginTransaction();
        try {
            // get user by email
            $user = $this->userRepository->findByEmail($email);

            // check data find user by email
            if ($user) {
                // radom password
                $randomPass = Str::lower(Str::random(10));

                // update password
                $this->userRepository->updatePassword($email, $randomPass);

                // send mail
                SendMail::dispatch(
                    'mail.reset-password',
                    [
                        'pass' => $randomPass
                    ],
                    $email,
                    "Đặt lại mật khẩu"
                );

                // commit transaction
                DB::commit();

                // redirect route login
                return true;
            } else {
                // return page when email not exits
                return false;
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
