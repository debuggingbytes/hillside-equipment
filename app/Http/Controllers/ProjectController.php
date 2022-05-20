<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $projects = Project::all();
    return view('projects.index', ['projects' => $projects]);
  }
  public function list(){

    // Display all projects for admin list.
    $projects = Project::all();
    return view('projects.list', ['projects' => $projects]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    return view('projects.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
      $this->validate($request, [
        'title' => 'required',
        'body' => 'required',
      ]);
  
      
      $project = Project::create($request->all());

      // dd($project);

      if($request->hasFile('projectImg')){
  
        //Check if its an array of images first
        if(is_array($request->file('projectImg'))){
          foreach($request->file('projectImg') as $file){
  
            $img_name = $file->hashName();
            $img_path = "/projects/$project->id/";
  
            $image = Image::create([
              'img_path' => $img_path.$img_name,
              'imagable_id' => $project->id,
              'imagable_type' => 'App\Models\Project'
            ]);
            // $file->storeAs($img_path, $img_name);
            $file->move(public_path('projects/'.$project->id), $img_name);
  
  
          }
        } // is array
  
      } // if hasFile()
      return redirect()->route('projects.list')->withMessage("Successfully added projected $project->title");
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Project  $project
   * @return \Illuminate\Http\Response
   */
  public function show(Project $project)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Project  $project
   * @return \Illuminate\Http\Response
   */
  public function edit(Project $project, $id)
  {
    // Return edit view with prepopulated
    // dd($project->findOrFail($id));
    return view('projects.edit', ['project' => $project->findOrFail($id)]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Project  $project
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Project $project)
  {
    //
    // Store all information submitted from request
    // Invoke Image controller to store images

    $this->validate($request, [
      'title' => 'required',
      'body' => 'required',
      'project_id' => 'required|numeric'
    ]);

    // Testing
    // dd($request->file('projectImg'));
    // foreach($request->file('projectImg') as $img){
    //   echo "$img <br>";
    // }
    // die();

    if($request->hasFile('projectImg')){

      //Check if its an array of images first
      if(is_array($request->file('projectImg'))){
        foreach($request->file('projectImg') as $file){

          $img_name = $file->hashName();
          $img_path = "/projects/$request->project_id/";

          $image = Image::create([
            'img_path' => $img_path.$img_name,
            'imagable_id' => $request->project_id,
            'imagable_type' => 'App\Models\Project'
          ]);
          // $file->storeAs($img_path, $img_name);
          $file->move(public_path('projects/'.$request->project_id ), $img_name);


        }
      } // is array

    } // if hasFile()
    $project->findOrFail($request->project_id)->update($request->all());
    return back()->withMessage("Successfully updated projected with new information.");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Project  $project
   * @return \Illuminate\Http\Response
   */
  public function destroy(Project $project, $id)
  {
    // To destroy a project, we need to find and remove a bunch of things

    // Step 1, remove all from uploads section
    $images = Image::where("imagable_id", $id)->get();
    // Step 1.A Does this project have images?
    if($images->isNotEmpty()){
      foreach($images as $image){
        unlink(public_path($image->img_path));
        $image->delete();
      }
        //delete folder
        rmdir(public_path('projects/'.$id));
       // Step 2:  Find all images linked to the project in the database and delete
      
    }
   
    if($images){
      // Step 3: Remove project from system
      $project->findOrFail($id)->delete();
      if($project){
        return redirect()->route('projects.list')->withMessage('Successfully deleted project from system');
      }
    }

    return back()->withMessage("Server Error: Could not delete project");

  }
}
