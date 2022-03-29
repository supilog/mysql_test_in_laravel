<?php

namespace App\Libs;
use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class MysqlTestLib
{
    public function test_primary_key($times){
        $this->disp(__FUNCTION__);
        $ts = $this->test_start();
        $num = Test::count();
        for($i = 0; $i < $times; $i++){
            $id = mt_rand(1, $num);
            $test = Test::find($id);
        }
        $this->test_finish($ts);
    }

    public function test_greater_than_integer($times, $num){
        $this->disp(__FUNCTION__);
        $ts = $this->test_start();
        for($i = 0; $i < $times; $i++){
            $price = mt_rand(1, 1000000);
            $tests = Test::where('price' , '>', $price)->take($num)->get();
        }
        $this->test_finish($ts);
    }

    public function test_name_like($times){
        $this->disp(__FUNCTION__);
        $ts = $this->test_start();
        for($i = 0; $i < $times; $i++){
            $test = Test::factory()->make();
            $target = explode(" ", $test['name'])[0];
            $tmp = Test::where('name', 'like' , '%' . $target . '%')->get();
        }
        $this->test_finish($ts);
    }

    public function disp($text){
        echo $text . "\n";
    }

    public function test_start(){
        return new Carbon();
    }

    public function test_finish(Carbon $dt_start){
        $dt = new Carbon();
        $diff = $dt_start->diffInSeconds($dt);
        $text = "Start:$dt_start->timestamp, End:$dt->timestamp => $diff sec";
        $this->disp($text);
    }

}
