USE yeti_cave;


INSERT INTO categories (category_value, category_name)
VALUES ('boards_skis', 'Доски и лыжи');

INSERT INTO categories (category_value, category_name)
VALUES ('mountings', 'Крепления');

INSERT INTO categories (category_value, category_name)
VALUES ('boots', 'Ботинки');

INSERT INTO categories (category_value, category_name)
VALUES ('clothes', 'Одежда');

INSERT INTO categories (category_value, category_name)
VALUES ('instruments', 'Инструменты');

INSERT INTO categories (category_value, category_name)
VALUES ('other', 'Разное');

INSERT INTO `users` (`user_registration_date`, `user_email`, `user_name`, `user_password`)
VALUES ('2001-05-21 13:54:05', 'ignat.v@gmail.com', 'Игнат', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka');


-- 2014 Rossignol District Snowboard', 'DESCRIPTION

INSERT INTO lots (lot_author, lot_category, lot_name, lot_description, lot_picture,
                  lot_creation_date, lot_end_date, lot_start_price,
                  lot_bet_step)
VALUES (1, 1, '2014 Rossignol District Snowboard', 'DESCRIPTION','img/lot-1.jpg',
        '2001-05-21 13:54:05', '2001-05-23 13:54:05', 10999,
        1000);

-- DC Ply Mens 2016/2017 Snowboard

INSERT INTO lots (lot_author, lot_category, lot_name, lot_description, lot_picture,
                  lot_creation_date, lot_end_date, lot_start_price,
                  lot_bet_step)
VALUES (1, 1, 'DC Ply Mens 2016/2017 Snowboard', 'DESCRIPTION','img/lot-2.jpg',
        '2001-05-21 13:54:05', '2001-05-23 13:54:05', 159999,
        1000);

-- Крепления Union Contact Pro 2015 года размер L/XL

INSERT INTO lots (lot_author, lot_category, lot_name, lot_description, lot_picture,
                  lot_creation_date, lot_end_date, lot_start_price,
                  lot_bet_step)
VALUES (1, 2, 'Крепления Union Contact Pro 2015 года размер L/XL', 'DESCRIPTION','img/lot-3.jpg',
        '2001-05-21 13:54:05', '2001-05-23 13:54:05', 8000,
        1000);

-- Ботинки для сноуборда DC Mutiny Charocal

INSERT INTO lots (lot_author, lot_category, lot_name, lot_description, lot_picture,
                  lot_creation_date, lot_end_date, lot_start_price,
                  lot_bet_step)
VALUES (1, 3, 'Ботинки для сноуборда DC Mutiny Charocal', 'DESCRIPTION','img/lot-4.jpg',
        '2001-05-21 13:54:05', '2001-05-23 13:54:05', 10999,
        1000);

-- Куртка для сноуборда DC Mutiny Charocal

INSERT INTO lots (lot_author, lot_category, lot_name, lot_description, lot_picture,
                  lot_creation_date, lot_end_date, lot_start_price,
                  lot_bet_step)
VALUES (1, 4, 'Куртка для сноуборда DC Mutiny Charocal', 'DESCRIPTION','img/lot-5.jpg',
        '2001-05-21 13:54:05', '2001-05-23 13:54:05', 7500,
        1000);

-- Маска Oakley Canopy

INSERT INTO lots (lot_author, lot_category, lot_name, lot_description, lot_picture,
                  lot_creation_date, lot_end_date, lot_start_price,
                  lot_bet_step)
VALUES (1, 6, 'Маска Oakley Canopy', 'DESCRIPTION','img/lot-6.jpg',
        '2001-05-21 13:54:05', '2001-05-23 13:54:05', 5400,
        1000);

-- Ставки

INSERT INTO bids (bid_date, bid_amount, bid_user, bid_lot)
VALUES ('2001-05-23 15:54:05', 1, 1, 7);

INSERT INTO bids (bid_date, bid_amount, bid_user, bid_lot)
VALUES ('2001-05-23 15:54:05', 1200, 1, 11);


select category_name from categories;

SELECT lot_name, lot_start_price, lot_picture,
  COUNT(bid_lot) AS bids_number, category_name, lot_creation_date
FROM lots
  LEFT JOIN bids ON lots.lot_id = bids.bid_lot
  INNER JOIN categories ON lots.lot_category = categories.category_id
WHERE lot_creation_date < lot_end_date
GROUP BY lots.lot_name, lot_start_price, lot_picture, lot_creation_date, lot_category
ORDER BY lot_creation_date DESC;