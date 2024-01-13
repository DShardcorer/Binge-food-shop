--admin_login
select * from admin_table where admin_name = $user_name

--admin_registration
SELECT * FROM admin_table WHERE admin_email = '$email'
INSERT INTO admin_table (admin_name, admin_email, admin_password) VALUES ('$username','$email','$password');
--delete_brand
DELETE FROM brands WHERE brand_id = '$delete_id'

--delete_category
DELETE FROM categories WHERE category_id = '$delete_id'

--delete_order
DELETE FROM user_orders WHERE order_id = '$delete_id'

--delete_payment
DELETE FROM user_payments WHERE payment_id = '$delete_id'

--delete_product
DELETE FROM products WHERE product_id = '$delete_id'


--delete_user
DELETE FROM user_table WHERE user_id = '$delete_id'

--edit_brand
SELECT * FROM brands WHERE brand_id = '$brand_id'

UPDATE brands SET brand_title = '$brand_title' WHERE brand_id = '$brand_id'

--edit_category
SELECT * FROM categories WHERE category_id = '$category_id'

UPDATE categories SET category_title = '$category_title' WHERE category_id = '$category_id'

--edit_product
SELECT * FROM products WHERE product_id = $edit_id;
SELECT * FROM categories WHERE category_id = $product_category;
SELECT * FROM brands WHERE brand_id = $product_brand;
UPDATE products SET product_title = '$product_title', 
                    product_description = '$product_description', product_keywords = '$product_keywords', 
                    category_id = '$product_category', brand_id = '$product_brand', product_image1 = '$product_image1', 
                    product_image2 = '$product_image2', product_image3 = '$product_image3', product_price = '$product_price' 
                    WHERE product_id = $edit_id;

--insert_brand
SELECT * FROM brands WHERE brand_title = '$brand_title'
INSERT INTO brands (brand_title) VALUES ('$brand_title')

--insert_categories
SELECT * FROM categories WHERE category_title = '$category_title'
INSERT INTO categories (category_title) VALUES ('$category_title')

--insert_product
INSERT INTO products (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) 
            VALUES ('$product_title','$product_description','$product_keywords','$product_categories','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(), '$product_status')


--list_orders
SELECT * FROM user_orders JOIN user_table ON user_orders.user_id = user_table.user_id  ORDER BY order_id DESC
 WHERE order_status = '$order_status_filter';
AND order_date BETWEEN '$start_date' AND '$end_date';

--list_payment
SELECT * FROM user_payments JOIN user_orders ON user_payments.order_id = user_orders.order_id
WHERE payment_mode = '$payment_method_filter'
AND date BETWEEN '$start_date' AND '$end_date';
SELECT get_total_sales('$start_date', '$end_date', '$payment_mode_filter') AS total_sales;
--list_user
SELECT * FROM user_table;

--view_brand
SELECT * FROM brands;

--view_categories
SELECT * FROM categories;

--view_products
SELECT * FROM products;

-----function
--get_product
SELECT * FROM products ORDER BY RANDOM() LIMIT 9 OFFSET 0;

--get_all_product
SELECT * FROM products ORDER BY RANDOM();

--filter
SELECT * FROM brands;
SELECT * FROM categories;

SELECT * FROM products WHERE 1=1
 
AND category_id IN ('" . implode("','", $category_ids) . "') 
AND brand_id::int IN ('" . implode("','", $brand_ids) . "') 
AND CAST(product_price AS FLOAT) >=  (float)$min_price  
AND CAST(product_price AS FLOAT) <=  (float)$max_price
ORDER BY 
    CAST(product_price AS FLOAT) ASC;
    CAST(product_price AS FLOAT) DESC;
    product_title ASC;
    product_title DESC;
    amount_sold DESC;
    amount_sold ASC;

--search
SELECT * FROM products WHERE product_keywords LIKE '%pie%';

--view_detail
SELECT * FROM products WHERE product_id=9;

--get_cart
SELECT * FROM cart_details WHERE ip_address='$ip' AND product_id='$get_product_id'

INSERT INTO cart_details (product_id,ip_address) VALUES ('$get_product_id','$ip')

--cart_function
SELECT * FROM cart_details WHERE ip_address='$ip' AND product_id='$get_product_id';
INSERT INTO cart_details (product_id,ip_address) VALUES ('$get_product_id','$ip')
--cart_sum
SELECT CAST(SUM(p.product_price * c.quantity) AS NUMERIC(10, 2)) AS total_price
    FROM cart_details c
    JOIN products p ON c.product_id = p.product_id
    WHERE c.ip_address = '$get_ip_add';

--order_detail
SELECT user_id FROM user_table WHERE username = '$username';
SELECT COUNT(*) as pending_order_count FROM user_orders WHERE user_id = '$user_id' AND order_status = 'pending';

---------
--confirm_payment
SELECT * FROM user_orders WHERE order_id = '$order_id';
INSERT INTO user_payments (order_id, payment_mode) 
                    VALUES ('$order_id', '$payment_mode');
UPDATE user_orders SET order_status = '$complete' WHERE order_id = '$order_id'
--delete_account
DELETE FROM user_table WHERE username = '$username_session'

--edit_account
SELECT * FROM user_table WHERE username = '$user_session_name';
UPDATE user_table SET username='$username', user_email='$user_email', 
                        user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' 
                        WHERE user_id=$update_id;

--order
SELECT * FROM cart_details WHERE ip_address = '$get_ip_add';
SELECT * FROM products WHERE product_id = $product_id;
INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $total_price, $invoice_number, " . count($order_info_values) . ", '$order_date', '$status');
DELETE FROM cart_details WHERE ip_address = '$get_ip_add';

--payment
SELECT * FROM user_table WHERE username = '$username';
--profile
SELECT * FROM user_table WHERE username = '$username';

--login
SELECT * FROM user_table WHERE username='$user_username';
SELECT * FROM cart_details WHERE ip_address='$user_ip';

--user_order
SELECT * FROM user_table WHERE username = '$username';
SELECT * FROM user_orders WHERE user_id = $user_id;

--user_register
SELECT * FROM user_table WHERE username='$user_username' OR user_email='$user_email';
INSERT INTO user_table (username,user_email,user_password, user_image, user_ip, user_address, user_mobile)
    VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact');