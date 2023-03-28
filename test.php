<?php

interface IExampleEntity extends IEntity {

}


class ExampleEntity extends Entity implements IExampleEntity {
    public function getTableName() { return "EXAMPLE"; }
    public function getTableDefinition()
    {
        return array(
            new ColumnDefinition( "name", "NAME" ),
            new ColumnDefinition( "address", "ADDRESS" ),
            new ColumnDefinition( "phone", "PHONE" ),
            new ColumnDefinition( "lastname", "LASTNAME" ),
            new ColumnDefinition( "id", "ID" )
        );
    }
}

class Example extends ExampleEntity {

    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function columnOfName()
    {
        return "NOMBRE";
    }
}







interface IExampleRepository extends IRepository {
    public function buscarId();
}


class ExampleRepository extends Repository implements IExampleRepository {

    const QUERY_BUSCAR_ID = ("SELECT * FROM T WHERE ID=:ID");
    public function buscarId()
    {
        QUERY_BUSCAR_ID
    }
}

?>