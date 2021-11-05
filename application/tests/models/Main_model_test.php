<?php

class Main_model_test extends TestCase
{
    public function setUp(): void 
    {
        $this->resetInstance();
        $this->CI->load->model('Main_model');
        $this->obj = $this->CI->Main_model;
    }

    public function test_get_todos()
    {
        $expected = [
            139 => 'makan',
            140 => 'tidur',
        ];
        $list = $this->obj->get_todos();
        foreach ($list as $todos) {
            $this->assertEquals($expected[$todos->id], $todos->name);
        }
    }

    public function test_find_todo()
    {
        $expected = [
            139 => 'makan',
        ];
        $todo = $this->obj->find_todo(139);
        $this->assertEquals($expected[$todo->id], $todo->name);
    }

    public function test_insert()
    {
        $data = array(
            'name' => 'minum',
            'status' => 0,
        );
        $insert = $this->obj->insert($data);
        $this->obj->db->delete('todos', array('id' => $insert));
        $this->assertIsInt($insert);
    }

    public function test_update()
    {
        $data = array(
            'name' => 'belajar',
        );
        $edit = $this->obj->update($data, 139);
        $this->obj->update(array('name' => 'makan'), 139);
        $this->assertEquals(1, $edit);
    }

}
?>