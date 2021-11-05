<?php
class IndexController_test extends TestCase
{
    public function test_index()
    {
        $output = $this->request('GET', 'IndexController/index');
        $this->assertStringContainsString(
            '<h1>Todo List <small style="font-size: 12px;">by <strong>Jose Purba</strong></small></h1>', 
            $output);
    }

}

?>