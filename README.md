# 📊 Stock Reports App

A Laravel-based web application for fetching, caching, and reporting historical stock price data from Rapid API. Users can submit a company symbol and date range, then receive a processed response via real-time WebSocket updates.

## 🚀 Features

- 📩 Form-based submission for stock symbol, date range, and user email
- 📈 Fetches stock data from external API (RapidAPI)
- 🧠 Smart caching with Redis (1-day expiration)
- 📬 Queue-based background processing with Laravel jobs
- 🔔 Real-time feedback with **Laravel Echo Server + Socket.IO**
- ✅ Form validation
- 🧪 PHPUnit tests

## 📦 Technologies

- Laravel 12
- PHP 8.4
- MySQL 8
- Redis
- Docker / Docker Compose
- Laravel Echo Server
- Pusher-compatible broadcasting via Socket.IO
- Vite (for JS bundling)

## Installation
```
git clone git@github.com:freelancerwebro/stock-reports.git
cd stock-reports
```

## Deploy the project
```
./deploy.sh
```

## Configuration
Ensure these API credentials are properly configured in .env:
```
RAPIDAPI_HEADER_HOST=your-api-host
RAPIDAPI_HEADER_KEY=your-api-key
RAPIDAPI_BASE_URI=https://api.example.com/endpoint
```

## Start queue workers
```
docker exec -it stock_reports_app php artisan queue:work
```

## Usage
1. Visit http://localhost:8084
2. Fill out the form with a stock symbol (e.g., AAPL), date range, and email
3. Submit the form
4. You'll be redirected to a /listen/{jobId} page 
5. Real-time updates will notify you once the data is ready

## Preview

#### Initial look
![app preview](https://raw.githubusercontent.com/freelancerwebro/stock-reports/main/resources/images/1.png)

#### No records found
![app preview](https://raw.githubusercontent.com/freelancerwebro/stock-reports/main/resources/images/1.5.png)

#### Datepicker usage
![app preview](https://raw.githubusercontent.com/freelancerwebro/stock-reports/main/resources/images/2.png)

#### Data found
![app preview](https://raw.githubusercontent.com/freelancerwebro/stock-reports/main/resources/images/3.png)

#### Charts
![app preview](https://raw.githubusercontent.com/freelancerwebro/stock-reports/main/resources/images/4.png)
