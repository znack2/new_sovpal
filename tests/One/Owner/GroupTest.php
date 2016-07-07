<?php namespace App\Tests\Group;

class GroupTest extends TestCase
{
 	public function test_join_group()
    {
		    $user2 = factory(User::class)->create();

		    $this->group->joinGroup($this->user,'2');

       	//check group has one user1 and method "users"
       	$this->assertCount(1, $this->group->users());

        //check how many items
        $this->assertEquals('2', $this->group->item_count);

        //check how many users
        $this->assertEquals('1', $this->group->user_count);

       	//check group has not user2 
       	$this->assertContains($user2->id, $this->group->users()->pluck('id'));

       	//check total and method "totalUsers"
       	$this->assertEquals(1, $this->group->user_count);


        Оптовая покупка
          К заказу добавляется сумма доставки поделённая на количество участников
          юзер выбирает только промежуток доставки
          Цена доставки не фиксированная зависит от количества участников 
          Количество участников в промежутке является коэффициент доставки
          При выборе 50% группы промежуток остальные получают флеш поменять 
          При перемене промежутка сумма доставки у всех меняется
          Окончательная цена доставки утверждается в конце 
          если скидка остаток возвращается (узнать можно ли расхлодить часть)
          Оплата холдиться на срок создания группы
          Если группа не собирается деньги расхолдятся
          каждый участник получает флеш не хочет ли он купить в розницу
          каждый участник получает флеш группа не завершена
          Каждый участник группы получает флеш если юзер вступает в группу
          Каждый участник группы получает флеш когда группа завершена
          Магазин получает список участников с контактами 
    }

    public function test_withdrow_from_group()
    {
      $this->group->JoinGroup($this->user);
      $this->group->withdrowFromGroup($this->user);

      $this->assertEquals(0, $this->group->user_count);
    }

    public function test_cant_join_already()
    {

    }

    public function test_cant_withdrow_if_not_join()
    {

    }



    public function test_show_no_members()
        {
          //Show_Similar_groups
        }
}