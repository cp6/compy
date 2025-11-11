<?php

namespace App\Http\Controllers;

use Faker\Factory as FakerFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

final class MockDataController extends Controller
{
    /**
     * Generate mock data for tables with pagination, filtering, and search.
     */
    public function index(Request $request): JsonResponse
    {
        $faker = FakerFactory::create();
        
        // Get query parameters
        $page = (int) $request->get('page', 1);
        $perPage = min((int) $request->get('per_page', 15), 100); // Max 100 per page
        $search = $request->get('search', '');
        $sortBy = $request->get('sort_by', 'id');
        $sortDir = $request->get('sort_dir', 'asc');
        
        // Get filters from query parameters
        $filters = $request->except(['page', 'per_page', 'search', 'sort_by', 'sort_dir']);
        
        // Generate mock data
        $totalItems = (int) $request->get('total_items', 1000); // Default 1000 items
        $data = $this->generateMockData($faker, $totalItems);
        
        // Apply search
        if (!empty($search)) {
            $data = $this->applySearch($data, $search);
        }
        
        // Apply filters
        if (!empty($filters)) {
            $data = $this->applyFilters($data, $filters);
        }
        
        // Apply sorting
        $data = $this->applySorting($data, $sortBy, $sortDir);
        
        // Get total count after filters/search
        $total = $data->count();
        
        // Apply pagination
        $paginatedData = $data->forPage($page, $perPage)->values();
        
        return response()->json([
            'data' => $paginatedData,
            'meta' => [
                'current_page' => $page,
                'per_page' => $perPage,
                'total' => $total,
                'last_page' => (int) ceil($total / $perPage),
                'from' => $total > 0 ? (($page - 1) * $perPage) + 1 : 0,
                'to' => min($page * $perPage, $total),
            ],
            'links' => [
                'first' => $request->fullUrlWithQuery(['page' => 1]),
                'last' => $request->fullUrlWithQuery(['page' => (int) ceil($total / $perPage)]),
                'prev' => $page > 1 ? $request->fullUrlWithQuery(['page' => $page - 1]) : null,
                'next' => $page < ceil($total / $perPage) ? $request->fullUrlWithQuery(['page' => $page + 1]) : null,
            ],
        ]);
    }
    
    /**
     * Generate mock data collection.
     */
    private function generateMockData($faker, int $count): Collection
    {
        $data = collect();
        
        for ($i = 1; $i <= $count; $i++) {
            $data->push([
                'id' => $i,
                'name' => $faker->name(),
                'email' => $faker->unique()->email(),
                'phone' => $faker->phoneNumber(),
                'company' => $faker->company(),
                'job_title' => $faker->jobTitle(),
                'address' => $faker->address(),
                'city' => $faker->city(),
                'state' => $faker->state(),
                'zip_code' => $faker->postcode(),
                'country' => $faker->country(),
                'status' => $faker->randomElement(['active', 'inactive', 'pending', 'suspended']),
                'role' => $faker->randomElement(['admin', 'user', 'manager', 'editor', 'viewer']),
                'department' => $faker->randomElement(['Sales', 'Marketing', 'IT', 'HR', 'Finance', 'Operations']),
                'salary' => $faker->numberBetween(30000, 150000),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                'is_verified' => $faker->boolean(70),
                'rating' => round($faker->randomFloat(2, 1, 5), 2),
            ]);
        }
        
        return $data;
    }
    
    /**
     * Apply search across searchable fields.
     */
    private function applySearch(Collection $data, string $search): Collection
    {
        $searchLower = strtolower($search);
        
        return $data->filter(function ($item) use ($searchLower) {
            $searchableFields = [
                'name',
                'email',
                'phone',
                'company',
                'job_title',
                'address',
                'city',
                'state',
                'country',
                'department',
            ];
            
            foreach ($searchableFields as $field) {
                if (isset($item[$field]) && str_contains(strtolower((string) $item[$field]), $searchLower)) {
                    return true;
                }
            }
            
            return false;
        });
    }
    
    /**
     * Apply filters to the data.
     */
    private function applyFilters(Collection $data, array $filters): Collection
    {
        foreach ($filters as $key => $value) {
            if (empty($value)) {
                continue;
            }
            
            $data = $data->filter(function ($item) use ($key, $value) {
                if (!isset($item[$key])) {
                    return false;
                }
                
                // Handle array values (e.g., status[]=active&status[]=pending)
                if (is_array($value)) {
                    return in_array($item[$key], $value);
                }
                
                // Handle range filters (e.g., salary_min=50000&salary_max=100000)
                if (str_ends_with($key, '_min')) {
                    $field = str_replace('_min', '', $key);
                    return isset($item[$field]) && $item[$field] >= $value;
                }
                
                if (str_ends_with($key, '_max')) {
                    $field = str_replace('_max', '', $key);
                    return isset($item[$field]) && $item[$field] <= $value;
                }
                
                // Exact match
                return $item[$key] == $value || str_contains(strtolower((string) $item[$key]), strtolower((string) $value));
            });
        }
        
        return $data;
    }
    
    /**
     * Apply sorting to the data.
     */
    private function applySorting(Collection $data, string $sortBy, string $sortDir): Collection
    {
        return $data->sortBy(function ($item) use ($sortBy) {
            return $item[$sortBy] ?? null;
        }, SORT_REGULAR, $sortDir === 'desc');
    }
    
    /**
     * Generate mock data for a specific resource type.
     */
    public function resource(Request $request, string $resource): JsonResponse
    {
        $faker = FakerFactory::create();
        
        // Get query parameters
        $page = (int) $request->get('page', 1);
        $perPage = min((int) $request->get('per_page', 15), 100);
        $search = $request->get('search', '');
        $sortBy = $request->get('sort_by', 'id');
        $sortDir = $request->get('sort_dir', 'asc');
        $filters = $request->except(['page', 'per_page', 'search', 'sort_by', 'sort_dir']);
        
        // Generate resource-specific mock data
        $totalItems = (int) $request->get('total_items', 500);
        $data = $this->generateResourceMockData($faker, $resource, $totalItems);
        
        // Apply search
        if (!empty($search)) {
            $data = $this->applySearch($data, $search);
        }
        
        // Apply filters
        if (!empty($filters)) {
            $data = $this->applyFilters($data, $filters);
        }
        
        // Apply sorting
        $data = $this->applySorting($data, $sortBy, $sortDir);
        
        $total = $data->count();
        $paginatedData = $data->forPage($page, $perPage)->values();
        
        return response()->json([
            'data' => $paginatedData,
            'meta' => [
                'current_page' => $page,
                'per_page' => $perPage,
                'total' => $total,
                'last_page' => (int) ceil($total / $perPage),
                'from' => $total > 0 ? (($page - 1) * $perPage) + 1 : 0,
                'to' => min($page * $perPage, $total),
            ],
            'links' => [
                'first' => $request->fullUrlWithQuery(['page' => 1]),
                'last' => $request->fullUrlWithQuery(['page' => (int) ceil($total / $perPage)]),
                'prev' => $page > 1 ? $request->fullUrlWithQuery(['page' => $page - 1]) : null,
                'next' => $page < ceil($total / $perPage) ? $request->fullUrlWithQuery(['page' => $page + 1]) : null,
            ],
        ]);
    }
    
    /**
     * Generate resource-specific mock data.
     */
    private function generateResourceMockData($faker, string $resource, int $count): Collection
    {
        return match ($resource) {
            'users' => $this->generateUsersData($faker, $count),
            'products' => $this->generateProductsData($faker, $count),
            'orders' => $this->generateOrdersData($faker, $count),
            'posts' => $this->generatePostsData($faker, $count),
            'tasks' => $this->generateTasksData($faker, $count),
            default => $this->generateMockData($faker, $count),
        };
    }
    
    /**
     * Generate users mock data.
     */
    private function generateUsersData($faker, int $count): Collection
    {
        $data = collect();
        
        for ($i = 1; $i <= $count; $i++) {
            $data->push([
                'id' => $i,
                'name' => $faker->name(),
                'email' => $faker->unique()->email(),
                'username' => $faker->unique()->userName(),
                'avatar' => $faker->imageUrl(200, 200, 'people'),
                'role' => $faker->randomElement(['admin', 'user', 'manager', 'editor']),
                'status' => $faker->randomElement(['active', 'inactive', 'pending']),
                'last_login' => $faker->optional()->dateTimeBetween('-30 days', 'now')->format('Y-m-d H:i:s'),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),
            ]);
        }
        
        return $data;
    }
    
    /**
     * Generate products mock data.
     */
    private function generateProductsData($faker, int $count): Collection
    {
        $data = collect();
        
        for ($i = 1; $i <= $count; $i++) {
            $price = $faker->randomFloat(2, 10, 1000);
            $data->push([
                'id' => $i,
                'name' => $faker->words(3, true),
                'description' => $faker->paragraph(),
                'sku' => $faker->unique()->bothify('SKU-####-???'),
                'price' => $price,
                'compare_price' => $faker->optional(0.7)->randomFloat(2, $price * 1.1, $price * 1.5),
                'stock' => $faker->numberBetween(0, 1000),
                'category' => $faker->randomElement(['Electronics', 'Clothing', 'Books', 'Home', 'Sports', 'Toys']),
                'brand' => $faker->company(),
                'rating' => round($faker->randomFloat(2, 1, 5), 2),
                'reviews_count' => $faker->numberBetween(0, 500),
                'image' => $faker->imageUrl(400, 400, 'products'),
                'status' => $faker->randomElement(['active', 'inactive', 'out_of_stock', 'discontinued']),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            ]);
        }
        
        return $data;
    }
    
    /**
     * Generate orders mock data.
     */
    private function generateOrdersData($faker, int $count): Collection
    {
        $data = collect();
        
        for ($i = 1; $i <= $count; $i++) {
            $subtotal = $faker->randomFloat(2, 50, 2000);
            $tax = $subtotal * 0.1;
            $shipping = $faker->randomFloat(2, 0, 50);
            $total = $subtotal + $tax + $shipping;
            
            $data->push([
                'id' => $i,
                'order_number' => $faker->unique()->bothify('ORD-####-???'),
                'customer_name' => $faker->name(),
                'customer_email' => $faker->email(),
                'subtotal' => $subtotal,
                'tax' => $tax,
                'shipping' => $shipping,
                'total' => $total,
                'status' => $faker->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled']),
                'payment_status' => $faker->randomElement(['paid', 'pending', 'failed', 'refunded']),
                'payment_method' => $faker->randomElement(['credit_card', 'paypal', 'bank_transfer', 'cash']),
                'shipping_address' => $faker->address(),
                'items_count' => $faker->numberBetween(1, 10),
                'created_at' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d H:i:s'),
            ]);
        }
        
        return $data;
    }
    
    /**
     * Generate posts mock data.
     */
    private function generatePostsData($faker, int $count): Collection
    {
        $data = collect();
        
        for ($i = 1; $i <= $count; $i++) {
            $data->push([
                'id' => $i,
                'title' => $faker->sentence(),
                'slug' => $faker->slug(),
                'excerpt' => $faker->paragraph(),
                'content' => $faker->text(500),
                'author' => $faker->name(),
                'category' => $faker->randomElement(['Technology', 'Business', 'Lifestyle', 'Travel', 'Food', 'Health']),
                'tags' => $faker->words(3),
                'views' => $faker->numberBetween(0, 10000),
                'likes' => $faker->numberBetween(0, 500),
                'comments_count' => $faker->numberBetween(0, 100),
                'status' => $faker->randomElement(['published', 'draft', 'archived']),
                'featured_image' => $faker->imageUrl(800, 600, 'nature'),
                'published_at' => $faker->optional(0.8)->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            ]);
        }
        
        return $data;
    }
    
    /**
     * Generate tasks mock data.
     */
    private function generateTasksData($faker, int $count): Collection
    {
        $data = collect();
        
        for ($i = 1; $i <= $count; $i++) {
            $data->push([
                'id' => $i,
                'title' => $faker->sentence(),
                'description' => $faker->optional()->paragraph(),
                'assignee' => $faker->name(),
                'status' => $faker->randomElement(['todo', 'in_progress', 'review', 'done', 'cancelled']),
                'priority' => $faker->randomElement(['low', 'medium', 'high', 'urgent']),
                'progress' => $faker->numberBetween(0, 100),
                'due_date' => $faker->optional(0.7)->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
                'project' => $faker->randomElement(['Project Alpha', 'Project Beta', 'Project Gamma', 'Project Delta']),
                'tags' => $faker->words(2),
                'estimated_hours' => $faker->numberBetween(1, 40),
                'actual_hours' => $faker->optional(0.5)->numberBetween(1, 50),
                'created_at' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d H:i:s'),
            ]);
        }
        
        return $data;
    }
}

