# API Documentation

## Products API

### Get All Products
**Endpoint:** `GET /api/products`

**Query Parameters:**
- `category` (optional): Filter products by category
- `per_page` (optional, default: 15): Number of items per page
- `paginate` (optional): Set to `false` to get all products without pagination

**Example Requests:**
```bash
# Get all products with pagination
curl http://localhost:8000/api/products

# Get products by category
curl http://localhost:8000/api/products?category=furniture

# Get all products without pagination
curl http://localhost:8000/api/products?paginate=false

# Custom pagination
curl http://localhost:8000/api/products?per_page=20
```

**Response:**
```json
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "title": "Product Name",
      "category": "furniture",
      "description": "Product description",
      "image_url": "data:image/jpeg;base64,/9j/4AAQSkZJRg...",
      "created_at": "2025-12-18T10:00:00.000000Z",
      "updated_at": "2025-12-18T10:00:00.000000Z"
    }
  ],
  "first_page_url": "http://localhost:8000/api/products?page=1",
  "from": 1,
  "last_page": 1,
  "last_page_url": "http://localhost:8000/api/products?page=1",
  "links": [...],
  "next_page_url": null,
  "path": "http://localhost:8000/api/products",
  "per_page": 15,
  "prev_page_url": null,
  "to": 10,
  "total": 10
}
```

### Get Single Product
**Endpoint:** `GET /api/products/{id}`

**Example Request:**
```bash
curl http://localhost:8000/api/products/1
```

**Response:**
```json
{
  "id": 1,
  "title": "Product Name",
  "category": "furniture",
  "description": "Product description",
  "image_url": "data:image/jpeg;base64,/9j/4AAQSkZJRg...",
  "created_at": "2025-12-18T10:00:00.000000Z",
  "updated_at": "2025-12-18T10:00:00.000000Z"
}
```

---

## Testimonials API

### Get All Testimonials
**Endpoint:** `GET /api/testimonials`

**Query Parameters:**
- `min_rating` (optional): Filter testimonials by minimum rating (1-5)
- `per_page` (optional, default: 15): Number of items per page
- `paginate` (optional): Set to `false` to get all testimonials without pagination

**Example Requests:**
```bash
# Get all testimonials with pagination
curl http://localhost:8000/api/testimonials

# Get testimonials with minimum rating
curl http://localhost:8000/api/testimonials?min_rating=4

# Get all testimonials without pagination
curl http://localhost:8000/api/testimonials?paginate=false

# Custom pagination
curl http://localhost:8000/api/testimonials?per_page=20
```

**Response:**
```json
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "name": "John Doe",
      "role": "CEO, Company Name",
      "rating": 5,
      "content": "Great service!",
      "image_url": "data:image/jpeg;base64,/9j/4AAQSkZJRg...",
      "created_at": "2025-12-18T10:00:00.000000Z",
      "updated_at": "2025-12-18T10:00:00.000000Z"
    }
  ],
  "first_page_url": "http://localhost:8000/api/testimonials?page=1",
  "from": 1,
  "last_page": 1,
  "last_page_url": "http://localhost:8000/api/testimonials?page=1",
  "links": [...],
  "next_page_url": null,
  "path": "http://localhost:8000/api/testimonials",
  "per_page": 15,
  "prev_page_url": null,
  "to": 10,
  "total": 10
}
```

### Get Single Testimonial
**Endpoint:** `GET /api/testimonials/{id}`

**Example Request:**
```bash
curl http://localhost:8000/api/testimonials/1
```

**Response:**
```json
{
  "id": 1,
  "name": "John Doe",
  "role": "CEO, Company Name",
  "rating": 5,
  "content": "Great service!",
  "image_url": "data:image/jpeg;base64,/9j/4AAQSkZJRg...",
  "created_at": "2025-12-18T10:00:00.000000Z",
  "updated_at": "2025-12-18T10:00:00.000000Z"
}
```

---

## Notes

- **Images**: Images are stored as BLOBs in the database and returned as base64-encoded data URLs in the `image_url` field
- **Pagination**: By default, all list endpoints return paginated results with 15 items per page
- **Ordering**: Testimonials are ordered by creation date (newest first)
- **Error Handling**: If a resource is not found, the API will return a 404 status code
