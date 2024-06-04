<?php

namespace system\uranus\java\org\springframework\controller;
use system\jupiter\core\GeneratorClass;

/* ####################### Controller : USAGE EXAMPLE ####################### 

	$varController = new Controller();

	$varController->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class Controller extends GeneratorClass {

public function __construct()

{

		parent :: __construct();

}

	public function write() {

		$output = ""; 

		$this->validateData();

$output .= "// Java Program to Demonstrate DepartmentController File";
$output .= "";
$output .= "// Importing package module to code fragment";
$output .= "package com.amiya.springbootdemoproject.controller;";
$output .= "";
$output .= "import com.amiya.springbootdemoproject.entity.Department;";
$output .= "import com.amiya.springbootdemoproject.service.DepartmentService;";
$output .= "import java.util.List;";
$output .= "// Importing required classes";
$output .= "import javax.validation.Valid;";
$output .= "import org.springframework.beans.factory.annotation.Autowired;";
$output .= "import org.springframework.web.bind.annotation.*;";
$output .= "";
$output .= "// Annotation";
$output .= "@RestController";
$output .= "";
$output .= "// Class";
$output .= "public class DepartmentController {";
$output .= "";
$output .= "    @Autowired private DepartmentService departmentService;";
$output .= "";
$output .= "    // Save operation";
$output .= "    @PostMapping("/departments")";
$output .= "    public Department saveDepartment(";
$output .= "        @Valid @RequestBody Department department)";
$output .= "    {";
$output .= "        return departmentService.saveDepartment(department);";
$output .= "    }";
$output .= "";
$output .= "    // Read operation";
$output .= "    @GetMapping("/departments")";
$output .= "    public List<Department> fetchDepartmentList()";
$output .= "    {";
$output .= "        return departmentService.fetchDepartmentList();";
$output .= "    }";
$output .= "";
$output .= "    // Update operation";
$output .= "    @PutMapping("/departments/{id}")";
$output .= "    public Department";
$output .= "    updateDepartment(@RequestBody Department department,";
$output .= "                     @PathVariable("id") Long departmentId)";
$output .= "    {";
$output .= "        return departmentService.updateDepartment(";
$output .= "            department, departmentId);";
$output .= "    }";
$output .= "";
$output .= "    // Delete operation";
$output .= "    @DeleteMapping("/departments/{id}")";
$output .= "    public String deleteDepartmentById(@PathVariable("id")";
$output .= "                                       Long departmentId)";
$output .= "    {";
$output .= "        departmentService.deleteDepartmentById(";
$output .= "            departmentId);";
$output .= "";
$output .= "        return "Deleted Successfully";";
$output .= "    }";
$output .= "}";
 return $output; }

 } 


?>

