## Проект имеет базовый функционал:
- Показ страницы с товарами. Товары расположены в карточках, где видно их название, стоимость, остаток на складе и изображение. Товары можно добавлять в корзину.
  
![image](https://github.com/user-attachments/assets/23e026c7-c3c1-4534-851f-858661747cfa)
- Показ страниц с описанием товара. Перейти на эти страницы можно со страницы со всеми товарами, кликнув на изображение товара.
  
![image](https://github.com/user-attachments/assets/458d744e-f01e-41bb-b715-5f707ced2a4b)
- После того, как товар добавили в корзину, у кнопки "В корзину" меняется название и оформление, она становится неактивной. В корзине изменяется количество товаров, что наглядно можно увидеть у иконки-корзины. Пользователь получает уведомление, что товар успешно добавился в корзину.

![image](https://github.com/user-attachments/assets/fecb7e01-6771-4ffc-8e98-9fc303cf3855)
- Кнопка "В корзину" также меняется и на странице с товаром, который был добавлен в корзину.

![image](https://github.com/user-attachments/assets/71852fd3-6584-4145-a331-8fda45426b22)
- В корзине можно изменять количество товара, удалять товар из корзины и очищать корзину. Если пользователь уменьшает количество товара в корзине до 0, товар удаляется из корзины. Из корзины можно перейти на страницу с товаром, который находится в корзине, кликнув на изображение или название товара.

![image](https://github.com/user-attachments/assets/aa16a25e-d807-4761-8eca-1130cc5816e4)
- Максимальное количество товара в корзине равно остатку этого товара на складе. Пользователь получит уведомление в случае, если попытается преодолеть максимальное количество.

![image](https://github.com/user-attachments/assets/c4882420-9b4c-48c9-b052-336903e9ceba)
- Показ страницы с оформлением товара. На страницу с оформлением товара можно перейти из корзины, нажав на кнопку "Оформить заказ". На странице пользователь должен ввести своё имя и почту.

![image](https://github.com/user-attachments/assets/a5b0c81b-9dd5-4dd8-b817-ffccb883bd03)
- После оформления заказа пользователь получает уведомление, что заказ успешно оформлен. Корзина обнуляется.

![image](https://github.com/user-attachments/assets/5d7638c3-96cc-4a63-bcfa-f926809d3015)
- Если товара нет в наличии, пользователь не сможет добавить его в корзину и получит соответствующее уведомление

![image](https://github.com/user-attachments/assets/32bfed63-dd20-4fc4-89c5-8b6f4291abc1)


## Техническая составляющая:
- Для заполнения БД тестовыми данными использовались классы-наполнители.
- Данные корзины пользователя хранятся в сессии.
- База данных состоит из 3 таблиц: products (продукты), orders (заказы), order_product (вспомогательная таблица, позволяющая исключить связь многие-ко-многим).





