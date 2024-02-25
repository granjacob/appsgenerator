
<?php


class SpringBootController extends GeneratorClass {
    protected $packageName;
    protected $controllerClassName;
    protected SpringAutowiredService $Services = array();
    protected SpringControllerMethod $Methods = array();
    protected SpringControllerMethod $Repositories = array();
    protected SpringControllerMethod $OtherThings = array();
    protected SpringControllerMethod $MoreThings = array();
    protected SpringControllerMethod $AndMoreThings = array();
    protected SpringControllerMethod $WithMoreThings = array();
    public function __construct() {
        parent::__construct();
        $this->packageName = null;
        $this->controllerClassName = null;
        $this->Services = array();
        $this->Methods = array();
        $this->Repositories = array();
        $this->OtherThings = array();
        $this->MoreThings = array();
        $this->AndMoreThings = array();
        $this->WithMoreThings = array();
    }
    public function setPackageName($packageName) {
        $this->packageName = $packageName;
        return $this;
    }
    public function setControllerClassName($controllerClassName) {
        $this->controllerClassName = $controllerClassName;
        return $this;
    }
    public function setServices(SpringAutowiredService $Services) {
        $this->Services = $Services;
        return $this;
    }
    public function setMethods(SpringControllerMethod $Methods) {
        $this->Methods = $Methods;
        return $this;
    }
    public function setRepositories(SpringControllerMethod $Repositories) {
        $this->Repositories = $Repositories;
        return $this;
    }
    public function setOtherThings(SpringControllerMethod $OtherThings) {
        $this->OtherThings = $OtherThings;
        return $this;
    }
    public function setMoreThings(SpringControllerMethod $MoreThings) {
        $this->MoreThings = $MoreThings;
        return $this;
    }
    public function setAndMoreThings(SpringControllerMethod $AndMoreThings) {
        $this->AndMoreThings = $AndMoreThings;
        return $this;
    }
    public function setWithMoreThings(SpringControllerMethod $WithMoreThings) {
        $this->WithMoreThings = $WithMoreThings;
        return $this;
    }
    public function getPackageName() {
        return $this->packageName;
    }
    public function getControllerClassName() {
        return $this->controllerClassName;
    }
    public function getServices() {
        return $this->Services;
    }
    public function getMethods() {
        return $this->Methods;
    }
    public function getRepositories() {
        return $this->Repositories;
    }
    public function getOtherThings() {
        return $this->OtherThings;
    }
    public function getMoreThings() {
        return $this->MoreThings;
    }
    public function getAndMoreThings() {
        return $this->AndMoreThings;
    }
    public function getWithMoreThings() {
        return $this->WithMoreThings;
    }
    public function addPackageNameItem($item) {
        array_push($this->packageName, $item);
        return $this;
    }
    public function addControllerClassNameItem($item) {
        array_push($this->controllerClassName, $item);
        return $this;
    }
    public function addServicesItem(SpringAutowiredService $item) {
        array_push($this->Services, $item);
        return $this;
    }
    public function addMethodsItem(SpringControllerMethod $item) {
        array_push($this->Methods, $item);
        return $this;
    }
    public function addRepositoriesItem(SpringControllerMethod $item) {
        array_push($this->Repositories, $item);
        return $this;
    }
    public function addOtherThingsItem(SpringControllerMethod $item) {
        array_push($this->OtherThings, $item);
        return $this;
    }
    public function addMoreThingsItem(SpringControllerMethod $item) {
        array_push($this->MoreThings, $item);
        return $this;
    }
    public function addAndMoreThingsItem(SpringControllerMethod $item) {
        array_push($this->AndMoreThings, $item);
        return $this;
    }
    public function addWithMoreThingsItem(SpringControllerMethod $item) {
        array_push($this->WithMoreThings, $item);
        return $this;
    }
    public function write() {
        $this->validateData();
        print "package {$this->packageName};\n";
        print "\n";
        print "import java.util.List;\n";
        print "\n";
        print "import org.springframework.web.bind.annotation.DeleteMapping;\n";
        print "import org.springframework.web.bind.annotation.GetMapping;\n";
        print "import org.springframework.web.bind.annotation.PathVariable;\n";
        print "import org.springframework.web.bind.annotation.PostMapping;\n";
        print "import org.springframework.web.bind.annotation.PutMapping;\n";
        print "import org.springframework.web.bind.annotation.RequestBody;\n";
        print "import org.springframework.web.bind.annotation.RestController;\n";
        print "\n";
        print "@RestController\n";
        print "public class {$this->controllerClassName} {\n";
        print "\n";
        print "    \n";
        if (is_array($this->Services)) {
            foreach ($this->Services as $item_Services) {
                $item_Services->write();
            }
        }
        print "\n";
        print "\n";
        print "    \n";
        if (is_array($this->Methods)) {
            foreach ($this->Methods as $item_Methods) {
                $item_Methods->write();
            }
        }
        print "\n";
        print "\n";
        print "    \n";
        if ((is_array($this->Repositories) && count($this->Repositories) > 0)) {
            print "\n";
            if (is_array($this->Repositories)) {
                foreach ($this->Repositories as $item_Repositories) {
                    $item_Repositories->write();
                }
            }
            print "\n";
        }
        print "\n";
        print "\n";
        print "    \n";
        if ((is_array($this->OtherThings) && count($this->OtherThings) > 0)) {
            print "\n";
            if (is_array($this->OtherThings)) {
                foreach ($this->OtherThings as $item_OtherThings) {
                    $item_OtherThings->write();
                }
            }
            print "\n";
        }
        print "\n";
        print "\n";
        print "    \n";
        if ((is_array($this->MoreThings) && count($this->MoreThings) > 0) && (is_array($this->AndMoreThings) && count($this->AndMoreThings) > 0)) {
            print "\n";
            if (is_array($this->MoreThings)) {
                foreach ($this->MoreThings as $item_MoreThings) {
                    $item_MoreThings->write();
                }
            }
            print " and \n";
            if (is_array($this->AndMoreThings)) {
                foreach ($this->AndMoreThings as $item_AndMoreThings) {
                    $item_AndMoreThings->write();
                }
            }
            print " \n";
            print "            \n";
            if ((is_array($this->WithMoreThings) && count($this->WithMoreThings) > 0)) {
                print "\n";
                if (is_array($this->WithMoreThings)) {
                    foreach ($this->WithMoreThings as $item_WithMoreThings) {
                        $item_WithMoreThings->write();
                    }
                }
                print "\n";
            }
            print "\n";
        }
        print "\n";
        print "}\n";
    }
}
?>
