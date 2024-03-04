<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserInsertController extends Controller
{
    public function insertAdmins()
    {
        $real_email = [
            'biwottech@gmail.com',
            'denkytheka@gmail.com',
            'kiplishi1@gmail.com',
            'neranickenterprises@gmail.com',
            'pkorir59@gmail.com',
            'pwambua25@gmail.com',
            'pwambua25@students.uonbi.ac.ke',
            'korirkipngetich@yahoo.com'
        ];

        // $sectors = Sector::where('parent', '=', 0)->get();
        for ($i = 0; $i < 2; $i++) {

            DB::transaction(function () use ($i, $real_email) {
                $first_name = fake()->firstName();
                $middle_name = fake()->lastName();
                $last_name = fake()->lastName();
                $fullname = "$first_name $middle_name $last_name";
                $email = $real_email[rand(0, 7)];
                $phone = fake()->unique()->phoneNumber();

                $user = new Team();
                $user->firstname = $first_name;
                $user->middlename = $middle_name;
                $user->lastname = $last_name;
                $user->fullname = $fullname;
                $user->title = 3;
                $user->designation = 1;
                $user->ministry = 0;
                $user->department = 0;
                $user->directorate = 0;
                $user->role_group = 0;
                $user->levelA = 0;
                $user->levelB = 0;
                $user->levelC = 0;
                $user->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                $user->filename = 'FQldlziXsAIzlbe.jpeg';
                $user->ftype = 'jpeg';
                $user->email = $email;
                $user->phone = $phone;
                if ($i == 1) {
                    $user->availability = 0;
                } else {
                    $user->availability = 1;
                }
                $user->disabled = 0;
                $user->createdby = 1;
                $user->datecreated = date('Y-m-d');
                $user->save();


                $user_password = new User();
                $user_password->pt_id = $user->id;
                $user_password->email = $email;
                $user_password->first_login = 0;
                $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                $user_password->type = 1;
                $user_password->date = date('Y-m-d H:i:s');
                $user_password->save();
            });
        }

        return 1;
    }

    public function insertGovernor()
    {
        $real_email = [
            'biwottech@gmail.com',
            'denkytheka@gmail.com',
            'kiplishi1@gmail.com',
            'neranickenterprises@gmail.com',
            'pkorir59@gmail.com',
            'pwambua25@gmail.com',
            'pwambua25@students.uonbi.ac.ke',
            'korirkipngetich@yahoo.com'
        ];
        DB::transaction(function () use ($real_email) {
            // 2 governor
            for ($i = 0; $i < 2; $i++) {
                $first_name = fake()->firstName();
                $middle_name = fake()->lastName();
                $last_name = fake()->lastName();
                $fullname = "$first_name $middle_name $last_name";
                $email = $real_email[rand(0, 7)];
                $phone = fake()->unique()->phoneNumber();

                $user = new Team();
                $user->firstname = $first_name;
                $user->middlename = $middle_name;
                $user->lastname = $last_name;
                $user->fullname = $fullname;
                $user->title = 1;
                $user->designation = 2;
                $user->ministry = 0;
                $user->department = 0;
                $user->directorate = 0;
                $user->role_group = 3;
                $user->levelA = 0;
                $user->levelB = 0;
                $user->levelC = 0;
                $user->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                $user->filename = 'FQldlziXsAIzlbe.jpeg';
                $user->ftype = 'jpeg';
                $user->level = 6;
                $user->email = $email;
                $user->phone = $phone;
                if ($i == 1) {
                    $user->availability = 0;
                } else {
                    $user->availability = 1;
                }
                $user->disabled = 0;
                $user->createdby = 1;
                $user->datecreated = date('Y-m-d');
                $user->save();

                $user_password = new User();
                $user_password->pt_id = $user->id;
                $user_password->email = $email;
                $user_password->first_login = 0;
                $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                $user_password->type = 1;
                $user_password->date = date('Y-m-d H:i:s');
                $user_password->save();
            }
            // 3 deputy governor
            for ($i = 0; $i < 2; $i++) {
                $first_name = fake()->firstName();
                $middle_name = fake()->lastName();
                $last_name = fake()->lastName();
                $fullname = "$first_name $middle_name $last_name";
                $email = $real_email[rand(0, 7)];
                $phone = fake()->unique()->phoneNumber();

                $user = new Team();
                $user->firstname = $first_name;
                $user->middlename = $middle_name;
                $user->lastname = $last_name;
                $user->fullname = $fullname;
                $user->title = 1;
                $user->designation = 3;
                $user->ministry = 0;
                $user->department = 0;
                $user->directorate = 0;
                $user->role_group = 3;
                $user->levelA = 0;
                $user->levelB = 0;
                $user->levelC = 0;
                $user->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                $user->filename = 'FQldlziXsAIzlbe.jpeg';
                $user->ftype = 'jpeg';
                $user->level = 6;
                $user->email = $email;
                $user->phone = $phone;
                $user->disabled = 0;
                if ($i == 1) {
                    $user->availability = 0;
                } else {
                    $user->availability = 1;
                }
                
                $user->createdby = 1;
                $user->datecreated = date('Y-m-d');
                $user->save();

                $user_password = new User();
                $user_password->pt_id = $user->id;
                $user_password->email = $email;
                $user_password->first_login = 0;
                $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                $user_password->type = 1;
                $user_password->date = date('Y-m-d H:i:s');
                $user_password->save();
            }

            // 4 county secretary
            for ($i = 0; $i < 2; $i++) {
                $first_name = fake()->firstName();
                $middle_name = fake()->lastName();
                $last_name = fake()->lastName();
                $fullname = "$first_name $middle_name $last_name";
                $email = $real_email[rand(0, 7)];
                $phone = fake()->unique()->phoneNumber();

                $user = new Team();
                $user->firstname = $first_name;
                $user->middlename = $middle_name;
                $user->lastname = $last_name;
                $user->fullname = $fullname;
                $user->title = 1;
                $user->designation = 4;
                $user->ministry = 0;
                $user->department = 0;
                $user->directorate = 0;
                $user->role_group = 3;
                $user->levelA = 0;
                $user->levelB = 0;
                $user->levelC = 0;
                $user->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                $user->filename = 'FQldlziXsAIzlbe.jpeg';
                $user->ftype = 'jpeg';
                $user->level = 6;
                $user->email = $email;
                $user->phone = $phone;
                $user->disabled = 0;
                if ($i == 1) {
                    $user->availability = 0;
                } else {
                    $user->availability = 1;
                }
                $user->createdby = 1;
                $user->datecreated = date('Y-m-d');
                $user->save();

                $user_password = new User();
                $user_password->pt_id = $user->id;
                $user_password->email = $email;
                $user_password->first_login = 0;
                $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                $user_password->type = 1;
                $user_password->date = date('Y-m-d H:i:s');
                $user_password->save();
            }

        });
        return 1;
    }

    public function insertCEC()
    {
        $real_email = [
            'biwottech@gmail.com',
            'denkytheka@gmail.com',
            'kiplishi1@gmail.com',
            'neranickenterprises@gmail.com',
            'pkorir59@gmail.com',
            'pwambua25@gmail.com',
            'pwambua25@students.uonbi.ac.ke',
            'korirkipngetich@yahoo.com'
        ];

        
        // 5 CEC
        DB::transaction(function () use ($real_email) {
            $sectors = Sector::where('parent', '=', 0)->get();

            for ($i = 0; $i < count($sectors); $i++) {
                for ($j = 0; $j < 2; $j++) {
                    $first_name = fake()->firstName();
                    $middle_name = fake()->lastName();
                    $last_name = fake()->lastName();
                    $fullname = "$first_name $middle_name $last_name";
                    $email = $real_email[rand(0, 7)];
                    $phone = fake()->unique()->phoneNumber();


                    $user = new Team();
                    $user->firstname = $first_name;
                    $user->middlename = $middle_name;
                    $user->lastname = $last_name;
                    $user->fullname = $fullname;
                    $user->title = 1;
                    $user->designation = 5;
                    $user->ministry = $sectors[$i]->stid;
                    $user->department = 0;
                    $user->directorate = 0;
                    $user->role_group = 2;
                    $user->levelA = 0;
                    $user->levelB = 0;
                    $user->levelC = 0;
                    $user->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                    $user->filename = 'FQldlziXsAIzlbe.jpeg';
                    $user->ftype = 'jpeg';
                    $user->email = $email;
                    $user->phone = $phone;
                    $user->disabled = 0;
                    if ($j == 1) {
                        $user->availability = 0;
                    } else {
                        $user->availability = 1;
                    }
                    $user->createdby = 1;
                    $user->datecreated = date('Y-m-d');
                    $user->save();

                    $user_password = new User();
                    $user_password->pt_id = $user->id;
                    $user_password->email = $email;
                    $user_password->first_login = 0;
                    $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                    $user_password->type = 1;
                    $user_password->date = date('Y-m-d H:i:s');
                    $user_password->save();
                }

                // get departments
                $depts = Sector::where('parent', '=', $sectors[$i]->stid)->get();
                for ($c = 0; $c < count($depts); $c++) {
                    // 6 CO
                    for ($h = 0; $h < 2; $h++) {
                        $first_name = fake()->firstName();
                        $middle_name = fake()->lastName();
                        $last_name = fake()->lastName();
                        $fullname = "$first_name $middle_name $last_name";
                        $email = $real_email[rand(0, 7)];
                        $phone = fake()->unique()->phoneNumber();

                        $user_dept = new Team();
                        $user_dept->firstname = $first_name;
                        $user_dept->middlename = $middle_name;
                        $user_dept->lastname = $last_name;
                        $user_dept->fullname = $fullname;
                        $user_dept->title = 1;
                        $user_dept->designation = 6;
                        $user_dept->ministry = $sectors[$i]->stid;
                        $user_dept->department = $depts[$c]->stid;
                        $user_dept->directorate = 0;
                        $user_dept->role_group = 1;
                        $user_dept->levelA = 0;
                        $user_dept->levelB = 0;
                        $user_dept->levelC = 0;
                        $user_dept->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                        $user_dept->filename = 'FQldlziXsAIzlbe.jpeg';
                        $user_dept->ftype = 'jpeg';
                        $user_dept->email = $email;
                        $user_dept->phone = $phone;
                        $user_dept->disabled = 0;
                        if ($h == 1) {
                            $user_dept->availability = 0;
                        } else {
                            $user_dept->availability = 1;
                        }
                        $user_dept->createdby = 1;
                        $user_dept->datecreated = date('Y-m-d');
                        $user_dept->save();

                        $user_password = new User();
                        $user_password->pt_id = $user_dept->id;
                        $user_password->email = $email;
                        $user_password->first_login = 0;
                        $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                        $user_password->type = 1;
                        $user_password->date = date('Y-m-d H:i:s');
                        $user_password->save();
                    }

                    $directorates = Sector::where('parent', '=', $depts[$c]->stid)->get();
                    for ($d = 0; $d < count($directorates); $d++) {
                        // 7 director
                        for ($t = 0; $t < 2; $t++) {
                            $first_name = fake()->firstName();
                            $middle_name = fake()->lastName();
                            $last_name = fake()->lastName();
                            $fullname = "$first_name $middle_name $last_name";
                            $email = $real_email[rand(0, 7)];
                            $phone = fake()->unique()->phoneNumber();

                            $user_dept_dir = new Team();
                            $user_dept_dir->firstname = $first_name;
                            $user_dept_dir->middlename = $middle_name;
                            $user_dept_dir->lastname = $last_name;
                            $user_dept_dir->fullname = $fullname;
                            $user_dept_dir->title = 1;
                            $user_dept_dir->designation = 7;
                            $user_dept_dir->ministry = $sectors[$i]->stid;
                            $user_dept_dir->department = $depts[$c]->stid;
                            $user_dept_dir->directorate = $directorates[$d]->stid;
                            $user_dept_dir->role_group = 2;
                            $user_dept_dir->levelA = 0;
                            $user_dept_dir->levelB = 0;
                            $user_dept_dir->levelC = 0;
                            $user_dept_dir->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->filename = 'FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->ftype = 'jpeg';
                            $user_dept_dir->email = $email;
                            $user_dept_dir->phone = $phone;
                            $user_dept_dir->disabled = 1;
                            if ($t == 1) {
                                $user_dept_dir->availability = 0;
                            } else {
                                $user_dept_dir->availability = 1;
                            }
                            $user_dept_dir->createdby = 1;
                            $user_dept_dir->datecreated = date('Y-m-d');
                            $user_dept_dir->save();

                            $user_password = new User();
                            $user_password->pt_id = $user_dept_dir->id;
                            $user_password->email = $email;
                            $user_password->first_login = 0;
                            $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                            $user_password->type = 1;
                            $user_password->date = date('Y-m-d H:i:s');
                            $user_password->save();
                        }

                        // 8 Deputy Director
                        for ($w = 0; $w < 2; $w++) {
                            $first_name = fake()->firstName();
                            $middle_name = fake()->lastName();
                            $last_name = fake()->lastName();
                            $fullname = "$first_name $middle_name $last_name";
                            $email = $real_email[rand(0, 7)];
                            $phone = fake()->unique()->phoneNumber();

                            $user_dept_dir = new Team();
                            $user_dept_dir->firstname = $first_name;
                            $user_dept_dir->middlename = $middle_name;
                            $user_dept_dir->lastname = $last_name;
                            $user_dept_dir->fullname = $fullname;
                            $user_dept_dir->title = 1;
                            $user_dept_dir->designation = 8;
                            $user_dept_dir->ministry = $sectors[$i]->stid;
                            $user_dept_dir->department = $depts[$c]->stid;
                            $user_dept_dir->directorate = $directorates[$d]->stid;
                            $user_dept_dir->role_group = 2;
                            $user_dept_dir->levelA = 0;
                            $user_dept_dir->levelB = 0;
                            $user_dept_dir->levelC = 0;
                            $user_dept_dir->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->filename = 'FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->ftype = 'jpeg';
                            $user_dept_dir->email = $email;
                            $user_dept_dir->phone = $phone;
                            $user_dept_dir->disabled = 1;
                            if ($w == 1) {
                                $user_dept_dir->availability = 0;
                            } else {
                                $user_dept_dir->availability = 1;
                            }
                            $user_dept_dir->createdby = 1;
                            $user_dept_dir->datecreated = date('Y-m-d');
                            $user_dept_dir->save();

                            $user_password = new User();
                            $user_password->pt_id = $user_dept_dir->id;
                            $user_password->email = $email;
                            $user_password->first_login = 0;
                            $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                            $user_password->type = 1;
                            $user_password->date = date('Y-m-d H:i:s');
                            $user_password->save();
                        }

                        // 9 Assistant Director
                        for ($q = 0; $q < 2; $q++) {
                            $first_name = fake()->firstName();
                            $middle_name = fake()->lastName();
                            $last_name = fake()->lastName();
                            $fullname = "$first_name $middle_name $last_name";
                            $email = $real_email[rand(0, 7)];
                            $phone = fake()->unique()->phoneNumber();

                            $user_dept_dir = new Team();
                            $user_dept_dir->firstname = $first_name;
                            $user_dept_dir->middlename = $middle_name;
                            $user_dept_dir->lastname = $last_name;
                            $user_dept_dir->fullname = $fullname;
                            $user_dept_dir->title = 1;
                            $user_dept_dir->designation = 9;
                            $user_dept_dir->ministry = $sectors[$i]->stid;
                            $user_dept_dir->department = $depts[$c]->stid;
                            $user_dept_dir->directorate = $directorates[$d]->stid;
                            $user_dept_dir->role_group = 2;
                            $user_dept_dir->levelA = 0;
                            $user_dept_dir->levelB = 0;
                            $user_dept_dir->levelC = 0;
                            $user_dept_dir->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->filename = 'FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->ftype = 'jpeg';
                            $user_dept_dir->email = $email;
                            $user_dept_dir->phone = $phone;
                            $user_dept_dir->disabled = 1;
                            if ($q == 1) {
                                $user_dept_dir->availability = 0;
                            } else {
                                $user_dept_dir->availability = 1;
                            }
                            $user_dept_dir->createdby = 1;
                            $user_dept_dir->datecreated = date('Y-m-d');
                            $user_dept_dir->save();

                            $user_password = new User();
                            $user_password->pt_id = $user_dept_dir->id;
                            $user_password->email = $email;
                            $user_password->first_login = 0;
                            $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                            $user_password->type = 1;
                            $user_password->date = date('Y-m-d H:i:s');
                            $user_password->save();
                        }

                        // 10 Manager
                        for ($y = 0; $y < 2; $y++) {
                            $first_name = fake()->firstName();
                            $middle_name = fake()->lastName();
                            $last_name = fake()->lastName();
                            $fullname = "$first_name $middle_name $last_name";
                            $email = $real_email[rand(0, 7)];
                            $phone = fake()->unique()->phoneNumber();

                            $user_dept_dir = new Team();
                            $user_dept_dir->firstname = $first_name;
                            $user_dept_dir->middlename = $middle_name;
                            $user_dept_dir->lastname = $last_name;
                            $user_dept_dir->fullname = $fullname;
                            $user_dept_dir->title = 1;
                            $user_dept_dir->designation = 10;
                            $user_dept_dir->ministry = $sectors[$i]->stid;
                            $user_dept_dir->department = $depts[$c]->stid;
                            $user_dept_dir->directorate = $directorates[$d]->stid;
                            $user_dept_dir->role_group = 2;
                            $user_dept_dir->levelA = 0;
                            $user_dept_dir->levelB = 0;
                            $user_dept_dir->levelC = 0;
                            $user_dept_dir->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->filename = 'FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->ftype = 'jpeg';
                            $user_dept_dir->email = $email;
                            $user_dept_dir->phone = $phone;
                            $user_dept_dir->disabled = 1;
                            if ($y == 1) {
                                $user_dept_dir->availability = 0;
                            } else {
                                $user_dept_dir->availability = 1;
                            }
                            $user_dept_dir->createdby = 1;
                            $user_dept_dir->datecreated = date('Y-m-d');
                            $user_dept_dir->save();

                            $user_password = new User();
                            $user_password->pt_id = $user_dept_dir->id;
                            $user_password->email = $email;
                            $user_password->first_login = 0;
                            $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                            $user_password->type = 1;
                            $user_password->date = date('Y-m-d H:i:s');
                            $user_password->save();
                        }

                        // 11 Assistant Manager
                        for ($g = 0; $g < 2; $g++) {
                            $first_name = fake()->firstName();
                            $middle_name = fake()->lastName();
                            $last_name = fake()->lastName();
                            $fullname = "$first_name $middle_name $last_name";
                            $email = $real_email[rand(0, 7)];
                            $phone = fake()->unique()->phoneNumber();

                            $user_dept_dir = new Team();
                            $user_dept_dir->firstname = $first_name;
                            $user_dept_dir->middlename = $middle_name;
                            $user_dept_dir->lastname = $last_name;
                            $user_dept_dir->fullname = $fullname;
                            $user_dept_dir->title = 1;
                            $user_dept_dir->designation = 11;
                            $user_dept_dir->ministry = $sectors[$i]->stid;
                            $user_dept_dir->department = $depts[$c]->stid;
                            $user_dept_dir->directorate = $directorates[$d]->stid;
                            $user_dept_dir->role_group = 2;
                            $user_dept_dir->levelA = 0;
                            $user_dept_dir->levelB = 0;
                            $user_dept_dir->levelC = 0;
                            $user_dept_dir->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->filename = 'FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->ftype = 'jpeg';
                            $user_dept_dir->email = $email;
                            $user_dept_dir->phone = $phone;
                            $user_dept_dir->disabled = 1;
                            if ($g == 1) {
                                $user_dept_dir->availability = 0;
                            } else {
                                $user_dept_dir->availability = 1;
                            }
                            $user_dept_dir->createdby = 1;
                            $user_dept_dir->datecreated = date('Y-m-d');
                            $user_dept_dir->save();

                            $user_password = new User();
                            $user_password->pt_id = $user_dept_dir->id;
                            $user_password->email = $email;
                            $user_password->first_login = 0;
                            $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                            $user_password->type = 1;
                            $user_password->date = date('Y-m-d H:i:s');
                            $user_password->save();
                        }

                        // 12 Principal Officer
                        for ($z = 0; $z < 2; $z++) {
                            $first_name = fake()->firstName();
                            $middle_name = fake()->lastName();
                            $last_name = fake()->lastName();
                            $fullname = "$first_name $middle_name $last_name";
                            $email = $real_email[rand(0, 7)];
                            $phone = fake()->unique()->phoneNumber();

                            $user_dept_dir = new Team();
                            $user_dept_dir->firstname = $first_name;
                            $user_dept_dir->middlename = $middle_name;
                            $user_dept_dir->lastname = $last_name;
                            $user_dept_dir->fullname = $fullname;
                            $user_dept_dir->title = 1;
                            $user_dept_dir->designation = 12;
                            $user_dept_dir->ministry = $sectors[$i]->stid;
                            $user_dept_dir->department = $depts[$c]->stid;
                            $user_dept_dir->directorate = $directorates[$d]->stid;
                            $user_dept_dir->role_group = 2;
                            $user_dept_dir->levelA = 0;
                            $user_dept_dir->levelB = 0;
                            $user_dept_dir->levelC = 0;
                            $user_dept_dir->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->filename = 'FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->ftype = 'jpeg';
                            $user_dept_dir->email = $email;
                            $user_dept_dir->phone = $phone;
                            $user_dept_dir->disabled = 1;
                            if ($z == 1) {
                                $user_dept_dir->availability = 0;
                            } else {
                                $user_dept_dir->availability = 1;
                            }
                            $user_dept_dir->createdby = 1;
                            $user_dept_dir->datecreated = date('Y-m-d');
                            $user_dept_dir->save();

                            $user_password = new User();
                            $user_password->pt_id = $user_dept_dir->id;
                            $user_password->email = $email;
                            $user_password->first_login = 0;
                            $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                            $user_password->type = 1;
                            $user_password->date = date('Y-m-d H:i:s');
                            $user_password->save();
                        }

                        // 13 Officer
                        for ($l = 0; $l < 2; $l++) {
                            $first_name = fake()->firstName();
                            $middle_name = fake()->lastName();
                            $last_name = fake()->lastName();
                            $fullname = "$first_name $middle_name $last_name";
                            $email = $real_email[rand(0, 7)];
                            $phone = fake()->unique()->phoneNumber();

                            $user_dept_dir = new Team();
                            $user_dept_dir->firstname = $first_name;
                            $user_dept_dir->middlename = $middle_name;
                            $user_dept_dir->lastname = $last_name;
                            $user_dept_dir->fullname = $fullname;
                            $user_dept_dir->title = 1;
                            $user_dept_dir->designation = 12;
                            $user_dept_dir->ministry = $sectors[$i]->stid;
                            $user_dept_dir->department = $depts[$c]->stid;
                            $user_dept_dir->directorate = $directorates[$d]->stid;
                            $user_dept_dir->role_group = 2;
                            $user_dept_dir->levelA = 0;
                            $user_dept_dir->levelB = 0;
                            $user_dept_dir->levelC = 0;
                            $user_dept_dir->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->filename = 'FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->ftype = 'jpeg';
                            $user_dept_dir->email = $email;
                            $user_dept_dir->phone = $phone;
                            $user_dept_dir->disabled = 1;
                            if ($l == 1) {
                                $user_dept_dir->availability = 0;
                            } else {
                                $user_dept_dir->availability = 1;
                            }
                            $user_dept_dir->createdby = 1;
                            $user_dept_dir->datecreated = date('Y-m-d');
                            $user_dept_dir->save();

                            $user_password = new User();
                            $user_password->pt_id = $user_dept_dir->id;
                            $user_password->email = $email;
                            $user_password->first_login = 0;
                            $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                            $user_password->type = 1;
                            $user_password->date = date('Y-m-d H:i:s');
                            $user_password->save();
                        }

                        // 14 Assistant Officer
                        for ($k = 0; $k < 2; $k++) {
                            $first_name = fake()->firstName();
                            $middle_name = fake()->lastName();
                            $last_name = fake()->lastName();
                            $fullname = "$first_name $middle_name $last_name";
                            $email = $real_email[rand(0, 7)];
                            $phone = fake()->unique()->phoneNumber();

                            $user_dept_dir = new Team();
                            $user_dept_dir->firstname = $first_name;
                            $user_dept_dir->middlename = $middle_name;
                            $user_dept_dir->lastname = $last_name;
                            $user_dept_dir->fullname = $fullname;
                            $user_dept_dir->title = 1;
                            $user_dept_dir->designation = 12;
                            $user_dept_dir->ministry = $sectors[$i]->stid;
                            $user_dept_dir->department = $depts[$c]->stid;
                            $user_dept_dir->directorate = $directorates[$d]->stid;
                            $user_dept_dir->role_group = 2;
                            $user_dept_dir->levelA = 0;
                            $user_dept_dir->levelB = 0;
                            $user_dept_dir->levelC = 0;
                            $user_dept_dir->floc = 'uploads/staff/5850_File_FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->filename = 'FQldlziXsAIzlbe.jpeg';
                            $user_dept_dir->ftype = 'jpeg';
                            $user_dept_dir->email = $email;
                            $user_dept_dir->phone = $phone;
                            $user_dept_dir->disabled = 1;
                            if ($k == 1) {
                                $user_dept_dir->availability = 0;
                            } else {
                                $user_dept_dir->availability = 1;
                            }
                            $user_dept_dir->createdby = 1;
                            $user_dept_dir->datecreated = date('Y-m-d');
                            $user_dept_dir->save();

                            $user_password = new User();
                            $user_password->pt_id = $user_dept_dir->id;
                            $user_password->email = $email;
                            $user_password->first_login = 0;
                            $user_password->password = '$2y$10$EQT/rVabl4Gg6VMSZ8Rwk.eSv4it2EsmpKZD.irhkeuMv/53.RJhG';
                            $user_password->type = 1;
                            $user_password->date = date('Y-m-d H:i:s');
                            $user_password->save();
                        }
                    }
                }
            }
    });


        return 1;
    }
}
