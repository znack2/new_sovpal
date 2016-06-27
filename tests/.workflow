
workflow 

UNIT TESTS BASED ON ACCEPTANCE
(small pieces,method/class)


INTEGRATION(PHPSPEC) 
check how two modules work together(services)

	FUNCTIONAL-high level of integration from outside in
	(developer pov requirements) unittest + database($I->seeInDatabase() or $I->seeRecord())
	how it should work from developer and it may fail from client!
	if i go there and search this should get this result

	ACCEPTANCE TESTS FOR ALL PAGES + selenium for ui
	low level of integration(codeception)
	(user stories,pov from client (ui elements),which unit I must write)

	BEHAT = BDD BEHAT FEATURES/NAME.FEATURE --APPEND-SNIPPETS

Regression test = find a bug!

//protected method check fields
//first all test without errors
//second all test empty forms
//third all test with wrong input

//arrange
//act
//assert

./vendor/bin/.phpunit 
./vendor/bin/codeception run functional filename.php

//migration for test
//add new database (name/database) to config
//create new Database
//add to phpunit.xml <env name="DB_CONNECTION" value="mysql_testing">
//artisan migration --database mysql_testing
//phpunit --filter name




dont always extend testCase if it does not use Facade use PHPUnit_Framework_TestCase

it_doesnt_allow_guest_to_download_videos()
{
	$this->action('GET', 'Controller@download',[1]); // 1 is some lesson to download

	$this->assertRedirectToRoute('subscription.create');
}

it_allows_paying_members_to_download_videos()
{
	//create world
	$this->beloggedInWithAccount();
	$this->mockLessonRepoToReturnStub(); // to knot insert to database!

	//act
	$this->action('GET', 'Controller@download',[1.'type'=>'Lesson']); // 1 is some lesson to download

	//assert/check
	$this->assertRedirectTo('some_link');
}

it_doesnt_allows_sheduled_videos_to_be_download()
{
	//create world
	$this->beloggedInWithAccount();
	$this->mockLessonRepoToReturnStub(['isScheduled'=>true]); 

	//act
	$this->action('GET', 'Controller@download',[1.'type'=>'Lesson']); // 1 is some lesson to download

	//assert/check
	$this->assertRedirectToRoute('home');
}



clone repo
composer install
npm install
"compile" js (we run webpack, so webpack -p basically)
test php
test js
sync some assets between repo and CDN
zip it all up
deploy through some mechanism (we use aws elastic beanstalk)