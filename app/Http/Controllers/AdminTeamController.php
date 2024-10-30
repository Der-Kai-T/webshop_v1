<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamUser;
use Illuminate\Http\Request;

class AdminTeamController extends Controller
{
    protected string $permission = "admin.team";
    public function index()
    {
        $this->check_permission("index");
        return view("admin.team.index", [
            'teams' => Team::all()
        ]);
    }

    public function create()
    {
        $this->check_permission("create");
        return view("admin.team.form");
    }

    public function store(Request $request)
    {
        $this->check_permission("create");
        $data = $request->validate([
            'name' => ['required'],
        ]);

        $team =  Team::create($data);

        return redirect("/admin/team/$team->id/edit")->with("success", "Team angelegt");
    }

    public function edit(Team $team)
    {
        $this->check_permission("update");
        return view("admin.team.form", [
            "team" => $team
        ]);
    }

    public function update(Request $request, Team $team)
    {
        $this->check_permission("update");
        $data = $request->validate([
            'name' => ['required'],
        ]);

        $team->update($data);

        return $team;
    }


    public function addUser(Request $request, Team $team)
    {
        $this->check_permission("update");
        $data = $request->validate([
            "id" => ["required"],
        ]);

        foreach($data['id'] as $id)
        {
            TeamUser::create([
                "user_id" => $id,
                "team_id" => $team->id
            ]);
        }
        return redirect("/admin/team/$team->id/edit")->with("success", "User zugewiesen");
    }

    public function removeUser(Request $request, Team $team)
    {
        $this->check_permission("update");
        $data = $request->validate([
            "id" => ["required"],
        ]);

        foreach($data['id'] as $id)
        {
          TeamUser::where("user_id", $id)
              ->where("team_id", $team->id)
              ->delete();
        }
        return redirect("/admin/team/$team->id/edit")->with("success", "User entfernt");
    }


}
