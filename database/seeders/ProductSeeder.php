<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Bluetooth Headphones',
                'description' => 'Premium noise-cancelling wireless headphones with 30-hour battery life and superior sound quality. Perfect for music lovers and professionals.',
                'sku' => 'WHB-001',
                'price' => 199.99,
                'stock_quantity' => 45,
                'sold_amount' => 1250.00,
                'status' => 'active',
                'image_url' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500',
            ],
            [
                'name' => 'Smart Watch Pro',
                'description' => 'Feature-rich smartwatch with heart rate monitoring, GPS tracking, and 7-day battery life. Compatible with iOS and Android.',
                'sku' => 'SWP-002',
                'price' => 349.99,
                'stock_quantity' => 28,
                'sold_amount' => 2100.00,
                'status' => 'active',
                'image_url' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500',
            ],
            [
                'name' => 'Mechanical Gaming Keyboard',
                'description' => 'RGB backlit mechanical keyboard with Cherry MX switches. Designed for gamers and typists who demand precision and durability.',
                'sku' => 'MGK-003',
                'price' => 129.99,
                'stock_quantity' => 62,
                'sold_amount' => 3897.00,
                'status' => 'active',
                'image_url' => 'https://images.unsplash.com/photo-1541140532154-b024d705b90a?w=500',
            ],
            [
                'name' => '4K Ultra HD Monitor',
                'description' => '27-inch 4K UHD monitor with HDR support and 144Hz refresh rate. Ideal for gaming, design, and professional work.',
                'sku' => 'MON-004',
                'price' => 449.99,
                'stock_quantity' => 15,
                'sold_amount' => 8999.80,
                'status' => 'active',
                'image_url' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=500',
            ],
            [
                'name' => 'Portable Power Bank 20000mAh',
                'description' => 'High-capacity portable charger with fast charging support for smartphones, tablets, and laptops. Compact and travel-friendly.',
                'sku' => 'PWR-005',
                'price' => 49.99,
                'stock_quantity' => 120,
                'sold_amount' => 2499.50,
                'status' => 'active',
                'image_url' => 'https://images.unsplash.com/photo-1609091839311-d5365f9ff1c8?w=500',
            ],
            [
                'name' => 'Wireless Mouse Ergonomic',
                'description' => 'Ergonomic wireless mouse with precision tracking and long battery life. Comfortable design for extended use.',
                'sku' => 'WMS-006',
                'price' => 39.99,
                'stock_quantity' => 0,
                'sold_amount' => 799.80,
                'status' => 'inactive',
                'image_url' => 'https://images.unsplash.com/photo-1527814050087-3793815479db?w=500',
            ],
            [
                'name' => 'USB-C Hub Multiport Adapter',
                'description' => '7-in-1 USB-C hub with HDMI, USB 3.0 ports, SD card reader, and power delivery. Perfect for MacBook and modern laptops.',
                'sku' => 'USB-007',
                'price' => 79.99,
                'stock_quantity' => 35,
                'sold_amount' => 1599.80,
                'status' => 'active',
                'image_url' => 'https://images.unsplash.com/photo-1587825140708-dfaf72ae4b04?w=500',
            ],
            [
                'name' => 'Standing Desk Converter',
                'description' => 'Adjustable standing desk converter that transforms any desk into a sit-stand workstation. Promotes better posture and health.',
                'sku' => 'DSK-008',
                'price' => 249.99,
                'stock_quantity' => 8,
                'sold_amount' => 4999.80,
                'status' => 'active',
                'image_url' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=500',
            ],
            [
                'name' => 'Webcam HD 1080p',
                'description' => 'Full HD webcam with auto-focus and built-in microphone. Perfect for video calls, streaming, and content creation.',
                'sku' => 'CAM-009',
                'price' => 89.99,
                'stock_quantity' => 22,
                'sold_amount' => 1799.80,
                'status' => 'active',
                'image_url' => 'https://images.unsplash.com/photo-1587825140708-dfaf72ae4b04?w=500',
            ],
            [
                'name' => 'Laptop Stand Aluminum',
                'description' => 'Premium aluminum laptop stand with adjustable height and ventilation. Reduces neck strain and improves airflow.',
                'sku' => 'LST-010',
                'price' => 59.99,
                'stock_quantity' => 50,
                'sold_amount' => 1199.80,
                'status' => 'active',
                'image_url' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=500',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
