<?php

namespace Tests\Feature;

use App\Models\DocumentCategory as Model;
use App\Services\DocumentCategoryService as Service;
use Database\Factories\DocumentCategoryFactory as ModelFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesApplication;
use Tests\TestCase;

class DocumentCategoryServiceTest extends TestCase
{
    use RefreshDatabase;
    use CreatesApplication;


    public function test_create_a_record()
    {
        $modelFactory = new ModelFactory();
        $service = new Service();
        $record = $service->create($modelFactory->definition());

        if ($record->id) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }

    }

    public function test_delete_a_record()
    {
        $modelFactory = new ModelFactory();
        $service = new Service();
        $record = $service->create($modelFactory->definition());

        $this->assertTrue($service->delete($record->id));
    }

    public function test_get_a_record()
    {
        $modelFactory = new ModelFactory();
        $service = new Service();
        $record = $service->create($modelFactory->definition());
        $recordCheck = $service->get($record->id);
        $this->assertTrue($recordCheck->id === $record->id);
    }

    public function test_get_records()
    {
        Model::factory(10)->create();
        $service = new Service();
        $this->assertTrue($service->all()->count() === 10);
    }

    public function test_make_model_factory()
    {
        Model::factory(10)->create();
        $this->assertDatabaseCount('document_categories', 10);
    }

    public function test_update_a_record()
    {
        $modelFactory = new ModelFactory();
        $service = new Service();
        $record = $service->create($modelFactory->definition());

        $newModelFactory = new ModelFactory();
        $data = $newModelFactory->definition();

        $service->update($record->id, $data);
        $recordCheck = $service->get($record->id);

        foreach ($data as $key => $value){
            $recordCheckValue = $recordCheck->$key;
            $assertion = $recordCheckValue == $value;
            $this->assertTrue($assertion,$recordCheckValue.'='.$value);
        }

    }
}
