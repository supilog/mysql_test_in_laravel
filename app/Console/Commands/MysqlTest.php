<?php

namespace App\Console\Commands;

use App\Libs\MysqlTestLib;
use Illuminate\Console\Command;

class MysqlTest extends Command
{
    protected $signature = 'mtest:exec';

    protected $description = 'execute mysql test';

    protected $mtl;

    public function __construct()
    {
        $this->mtl = new MysqlTestLib();
        parent::__construct();
    }

    public function handle()
    {
        // PRIMARY KEY FIND
        $this->mtl->test_primary_key(50000);
        // INTEGER GT
        $this->mtl->test_greater_than_integer(50000, 100);

        // NAME LIKE
        $this->mtl->test_name_like(400);

        return 0;
    }
}
