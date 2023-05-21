<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserInfo extends Model
{
    use HasFactory;

    public static function recommendation()
    {
        $user_questionnaire = DB::table('user_questionnaires')
            ->where('users_id', '=', Auth::id())
            ->limit(1)
            ->get()[0] ?? [];

        $where = [];

        if ($user_questionnaire->birth_year_min) $where[] = ['birth_year_min', '>=', $user_questionnaire->birth_year_min];
        if ($user_questionnaire->birth_year_max) $where[] = ['birth_year_max', '<=', $user_questionnaire->birth_year_max];
        if ($user_questionnaire->city) $where[] = ['city', '=', $user_questionnaire->city];
        if ($user_questionnaire->is_man) $where[] = ['is_man', '=', $user_questionnaire->is_man];

        $where[] = ['users_id', '!=', Auth::id()];

        // dd($where);

        // return DB::table('user_infos')->where($where)->get()[0];

        return UserInfo::where($where)
            // ->join('likes', function (JoinClause $join) {
            //     $join->on('likes.to_user', '!=', 'user_infos.users_id')
            //         ->where('likes.from_user', '=', Auth::user()->id);
            // })
            ->first();
            // ->get();
    }

    public static function getFullInfo(int $id)
    {
        return DB::table('user_infos')
            ->select([
                'user_infos.*',
                'user_questionnaires.birth_year_min',
                'user_questionnaires.birth_year_max',
                'user_questionnaires.city as questionnaire_city',
                'user_questionnaires.is_man as questionnaire_is_man',
                'users.email'
            ])
            ->join('user_questionnaires', 'user_infos.users_id', '=', 'user_questionnaires.users_id')
            ->join('users', 'users.id', '=', 'user_infos.users_id')
            ->where('user_infos.users_id', '=', $id)
            ->limit(1)
            ->get()[0] ?? [];
    }

    public static function search(Request $request)
    {
        $name = $request->get('name');
        $age_min = $request->get('age_min') ? date('Y') - $request->get('age_min') : NULL; // 18
        $age_max = $request->get('age_max') ? date('Y') - $request->get('age_max') : NULL; // 30
        $city = $request->get('city');
        $is_man = $request->get('is_man');

        $where_query = [];

        if ($name) $where_query[] = ['name', 'LIKE', "%$name%"];
        if ($age_min) $where_query[] = ['birth_year', "<=", "$age_min"];
        if ($age_max) $where_query[] = ['birth_year', ">=", "$age_max"];
        if ($city) $where_query[] = ['city', '=', "$city"];
        if (isset($is_man)) $where_query[] = ['is_man', '=', "$is_man"];
        if (Auth::check()) $where_query[] = ['users_id', '!=', Auth::user()->id];

        $query = DB::table('user_infos');

        if (!empty($where_query)) $query->where($where_query);

        return $query->paginate(16);
    }

    public function get(int $id)
    {
        DB::table('user_infos')
            ->where('users_id', '=', $id)
            ->get();
    }
}
