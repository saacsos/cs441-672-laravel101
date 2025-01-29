<?php

namespace App\Console\Commands;

use App\Http\Requests\CreateAdminRequest;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create administrator user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask("What is administrator's name?", "");
        $email = $this->ask("What is administrator's email?", "");
        $password = $this->secret("What is administrator's password?");
        $confirmPassword = $this->secret("Please confirm password?");

        $input = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $confirmPassword,
        ];

        $validator = Validator::make($input, [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'unique:users,name'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                'confirmed'
            ]
        ]);

        if ($validator->fails()) {
            // แสดงผลข้อผิดพลาด
            $this->error('Validation failed:');
            foreach ($validator->errors()->all() as $error) {
                $this->warn($error);
            }
            return self::FAILURE;
        }

        $this->table(
            ['name', 'email', 'password'], [
            [$name, $email, ' (hashed) '],
        ]);
        if ($this->confirm("Are you sure?")) {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->email_verified_at = now();
            $user->role = "ADMIN";
            $user->save();

            $this->info("Admin user created");
            return self::SUCCESS;
        }

        $this->error("Admin user cannot be created");
        return self::FAILURE;
    }
}
