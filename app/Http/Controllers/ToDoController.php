<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\ToDo;

class ToDoController extends Controller
{
    //
    public function index() { //Function to show the To-Dos dashborad

        if(session()->has('userEmail')){ //if is a session active and such session has an 'userEmail' parameter
            
            $rFolder = Folder::orderBy('created_at', 'asc')->get(); //fill the $rFolder info with the Folder model query of all users on the table
            $rToDo = ToDo::orderBy('created_at', 'asc')->get(); //fill the $rToDo info with the ToDo model query of all users on the table
            return view('todo')->withFolders($rFolder)->withToDos($rToDo); 
            //return the todo view with the folders and To-Dos contained in $rFolder and $rToDo respectively

        }
        return redirect('/'); //if there's no session or, if it is and it has not an 'userEmail' parameter, then redirect to the root page

    }

    public function store(Request $request) { //Function to create (store) a new to-do on the database, the request is for the to-do's input info
        //that is meant to be stored

        try {//try the desired behavior
            
            $todo = new ToDo; //filling the $todo variable invoking the To-Do model previously created
            $todo->description = $request->description; //filling model description with typed description
            $todo->status      = '0'; // filling model status with typed status
            $todo->users_id    = session()->get('userID'); // filling model users_id with typed users_id
            $todo->folder_id      = $request->folder_id; // filling model folder_id with typed folder_id
            $todo->save(); //method to insert the filled info into the database
            
            return redirect('to-do')->with('successMsg', 'To-Do created successfully'); //after insert the new To-Do redirect to the root view
            //with a success message for the To-Do insert

        } catch (\Exception $e) { //if an exception comes up, here is were we get it
            return back()->with('errorSession', 'An error occurred on the To-Do creation attemp. 
                Please try again'); //return back the todo view with the error message
        }
    }

    public function update(Request $request) { //Function to update any To-Do's info, the request is for the To-Do's info
        //that is meant to be stored
        
        try { //try the desired behavior
            
            $todo = ToDo::findOrFail($request->id); //filling the $todo variable using the ToDo model to find the To-Do where the ID matches the $request->id
            
            $todo->description     = $request->description; //filling model description with the sent description
            $todo->folder_id     = $request->folder_id; //filling model folder_id with the sent folder_id
            $todo->update(); //method to update the To-Do's status on the database
            
            return redirect('to-do')->with('successMsg', 'To-Do Updated'); //return to the same view with a success message

        } catch (\Exception $e) { //if an exception comes up, here is were we get it

            return back()->with('errorSession', 'An error occurred on the To-Do update attemp. 
            Please try again'); //return back the todo view with the error message
            
        }
    }

    public function statusUpdate(Request $request) { //Function to update any To-Do's status, the request is for the To-Do's info
        //that is meant to be stored
        
        try { //try the desired behavior
            
            $todo = ToDo::findOrFail($request->id); //filling the $todo variable using the ToDo model to find the To-Do where the ID matches the $request->id
            
            if($request->status == NULL){
                $todo->status     = '0'; //filling model status with the sent status
            }else{
                $todo->status     = $request->status; //filling model status with the sent status
            }

            $todo->update(); //method to update the To-Do's status on the database
            
            return redirect('to-do')->with('successMsg', 'To-Do Completation Updated'); //return to the same view with a success message

        } catch (\Exception $e) { //if an exception comes up, here is were we get it

            return back()->with('errorSession', 'An error occurred on the To-Do status update attemp. 
            Please try again'); //return back the todo view with the error message
            
        }
    }

    public function delete(Request $request) { //Fuction to delete a To-Do, the request is for the To-Do info
        //that is meant to be stored

        try {//try the desired behavior

            $todo = ToDo::findOrFail($request->id); //filling the $user variable using the User model to find the user where the ID matches the $request->id
            $todo->delete(); //method to delete the user on the database
            return redirect('to-do')->with('successMsg', 'To-Do Deleted Successfully!'); //return to the same view with a success message
        
        } catch (\Exception $e) { //if an exception comes up, here is were we get it
            
            return back()->with('errorSession', 'An error occurred on the To-Do delete attemp. 
            Please try again'); //return back the todo view with the error message

        }
    }

    public function folderStore(Request $request) { //Function to create (store) a new folder on the database, the request is for the folder's input info
        //that is meant to be stored

        try {//try the desired behavior
            
            $folder = new Folder; //filling the $folder variable invoking the Folder model previously created
            $folder->name     = $request->fname; //filling model namewith typed name
            $folder->users_id = session()->get('userID'); // filling model users_id with typed users_id
            $folder->save(); //method to insert the filled info into the database
            
            return redirect('to-do')->with('successMsg', 'Folder created successfully'); //after insert the new To-Do redirect to the root view
            //with a success message for the To-Do insert

        } catch (\Exception $e) { //if an exception comes up, here is were we get it

            $errorCode = $e->errorInfo[1]; //if the exception was a SQL exception, here we get the error code

            if($errorCode == 1062){ //if the exception was a SQL exception and the error code is equal to 1062 value

                return back()->with('errorSession', 'The folder name is already created, cannot be folders with same name');
                //return an error message indicating that the email already exists
            
            }else{

                return back()->with('errorSession', 'An error occurred on the folder creation attemp. 
                Please try again'); //return back the todo view with the error message

            }
        }
    }

    public function folderDelete(Request $request) { //Fuction to delete a To-Do, the request is for the To-Do info
        //that is meant to be stored

        try {//try the desired behavior

            $folder = Folder::findOrFail($request->id); //filling the $user variable using the User model to find the user where the ID matches the $request->id
            $folder->delete(); //method to delete the user on the database
            return redirect('to-do')->with('successMsg', 'Folder Deleted Successfully!'); //return to the same view with a success message
        
        } catch (\Exception $e) { //if an exception comes up, here is were we get it
            
            $errorCode = $e->errorInfo[1]; //if the exception was a SQL exception, here we get the error code

            if($errorCode == 1451){ //if the exception was a SQL exception and the error code is equal to 1451 value

                try{//try the desired behavior

                    ToDo::where('folder_id',$request->id)->delete(); //deleting all children (all to-do's in that folder)

                    $folder = Folder::findOrFail($request->id); //filling the $user variable using the User model to find the user where the ID matches the $request->id
                    $folder->delete(); //method to delete the user on the database
                    return redirect('to-do')->with('successMsg', 'Folder Deleted Successfully!'); //return to the same view with a success message

                } catch (\Exception $e) { //if an exception comes up, here is were we get it
                    
                }

                return back()->with('errorSession', 'The folder name is already created, cannot be folders with same name');
                //return an error message indicating that the email already exists
            
            }else{
            
                return back()->with('errorSession', 'An error occurred on the folder delete attemp. 
                Please try again'); //return back the todo view with the error message
            }

        }
    }
}
