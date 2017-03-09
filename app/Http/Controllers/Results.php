<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Results extends Controller
{
    public function get_upload_form()
    {
    	return view('upload.form');
    }

    public function store_result(Request $request)
    {
    	$file = $request->file('excel');
    	if($file->isValid())
        {
            $file_source = $file->getClientOriginalExtension();
            $file_new_name = rand(11111, 99999).'.'.$file_source;
            $attr = array();
            $first_row;
            $stored_file = $file->move('files', $file_new_name);

            $subjects_names = $this->get_names($stored_file);
            $max_scores_arr = $this->get_max_scores($stored_file);

            $students = \Excel::load($stored_file, function($reader){
                $reader->skip(2);
                $reader->noHeading();
                $reader->ignoreEmpty();
            })->get();

            foreach ($students->toArray() as $student) {
                //die(dd(sizeof($students->toArray())));
                $total = 0;
                for ($i=0; $i < sizeof($subjects_names); $i++) { 
                    $trail[$subjects_names[$i]] = $student[$i+3];
                    $total += $student[$i+3];
                }
                $user = \App\User::firstOrCreate([
                        'code' => $student[1],
                    ]);

                $user->name = $student[0];
                $user->class = $student[2];
                $user->subjects = json_encode($trail);
                $user->total = $total;
                $user->percentage = round($total*100/$max_scores_arr[1], 2);
                $user->save();

            }

            return 'تم';
            return view('upload.results', compact('students'));
        }
    }

    public function get_max_scores($stored_file)
    {
        //getting the values of scores column
        $max_scores = \Excel::load($stored_file, function($reader){
            $reader->noHeading();
            $reader->skip(1);
            $reader->ignoreEmpty();
        })->first();

        $max_scores_arr = array();
        $total = 0;
        for ($i=3; $i < sizeof($max_scores); $i++) { 
            array_push($max_scores_arr, $max_scores[$i]);
            $total += $max_scores[$i];
        }
        $max_total = array($max_scores_arr, $total);
        return $max_total;
    }

    public function get_names($stored_file)
    {
        $names = \Excel::load($stored_file, function($reader){
        $reader->noHeading();
        $reader->ignoreEmpty();
        $reader->limit(1);
        })->first();      
 
        $names_arr = array();
        for ($i=3; $i < sizeof($names); $i++) { 
            array_push($names_arr, $names[$i]);
        }

        return $names_arr;
    }

    public function display_result()
    {
        return view('result.search');
    }

    public function find_result(Request $request)
    {
        $code = filter_var($request->search_input, FILTER_SANITIZE_NUMBER_INT);
        $user = \App\User::where('code', $code)->first();
        $subjects = json_decode($user->subjects);

        return view('result.result', compact('user', 'subjects'));
    }


}


