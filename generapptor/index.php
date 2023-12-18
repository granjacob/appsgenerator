<?php


class App {
    
    public $applicationFrontend;

    public $applicationBackend;

    public $applicationDatabase;

    public function __construct()
    {
        $this->applicationFrontend = new BasicFrontend();
        $this->applicationBackend = new BasicBackend();
        $this->applicationDatabase = new Database();


    }
}

class Generapptor {

}



class Pipeline {
    public $in;
    public $out;
}


class ReverseEngineeringPipeline extends Pipeline {

}

class FrontendUserInteractionPipeline extends Pipeline {

}

class FrontendBackendInteractionPipeline extends Pipeline {
}

class BackendDatabaseClusterInteractionPipeline extends Pipeline {

}

class BackendDatabseInteractionPipeline extends Pipeline {

}

class BackendFullApplicationPipeline extends Pipeline {

}


class Gobject {

}

class Application extends Gobject {
    public $packages;
}

class Package extends Gobject {
    public $entities;
}

class Entities extends Gobject { 
    public $attributes;
    public $operations;
}
class Attribute extends Gobject {
    public $type;
    public $name;
}

class Operation extends Gobject {
    public $returnType;
    public $name;
    public $parameters;
    public $body;
}
class EntityRelationship extends Gobject {
    public $name;
    public $entitySource;
    public $entityDestination;
    public $relationAttributes;

}
class Process extends Gobject { 
    public $steps;
}


class Database {
    public $user;
}

class DatabaseCluster {
    public $databaseList;
}

class GeneratedApplicationsCluster {
    public $applications;
}


class FullApplication {
    public $finalApplication;
    public $applicationAdministraiveApp;
}


class BasicFrontend {
    public $views;
    public $viewControllers;
    public $controllerServices;
}

class BasicBackend {
    public $controllers;

    public $services;

    public $dataAccess;
}

class DataAccess {
    public $datasources;
    public $repositories;
    public $entities;
}



class GenerapptorFrontend extends BasicFrontend {

}

class GenerapptorBackend extends BasicBackend {

}

class ApplicationApproximation {
    public $applicationFrontend;

    public $applicationBackend;

    public $applicationDatabase;

    public function __construct()
    {
        $this->applicationFrontend = new BasicFrontend();
        $this->applicationBackend = new BasicBackend();
        $this->applicationDatabase = new Database();


    }
}


class FinalFrontend extends BasicFrontend {

}

class FinalBackend extends BasicBackend {

}

class FinalDatabase extends Database {

}

class FinalApplication extends ApplicationApproximation {

   public function __construct()
    {
        $this->applicationFrontend = new FinalFrontend();
        $this->applicationBackend = new FinalBackend();
        $this->applicationDatabase = new FinalDatabase();


    }
}

?>