<?php

require("core.php");

use system\titan\com\TestSnippet;
use system\titan\com\SecondTest;

$varTestSnippet = new TestSnippet();

$varTestSnippet->write();

print 'Test 1 passed OK!' . endl();

$varSecondTest = new SecondTest();

$varvar = new TestSnippet();
$varSecondTest->addVarItem( $varvar );
$varSecondTest->addVarItem( $varvar );
$varSecondTest->addVarItem( $varvar );
$varSecondTest->addVarItem( $varvar );



$varSecondTest->write();


print 'Test 2 partially passed <%>!' . endl();
print 'use \system\titan\com\SecondTest; \ must be removed';
print 'Testing '

