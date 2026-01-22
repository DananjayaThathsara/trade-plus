TradePulse

Event-Driven Trading Dashboard

TradePulse is a real-time trading analytics dashboard built with Laravel 12, designed around an event-sourced architecture.
It focuses on performance, scalability, and data integrity while keeping the frontend simple and server-driven.

Instead of a heavy SPA, TradePulse uses Livewire and Alpine.js to deliver real-time updates with minimal complexity.

🚀 Features

-Event-sourced trade lifecycle management
-Real-time dashboard updates using Livewire 3.6
-Reactive UI interactions powered by Alpine.js
-Asynchronous background processing with queues
-Cached projections for fast KPI retrieval
-Clean, responsive UI built with Tailwind CSS v4
-Asset-based filtering and pagination
-Production-ready architecture with full auditability

🧠 Architecture

TradePulse follows a Command → Event → Projection → Cache → UI flow.

-Commands trigger domain actions (create or update trades)
-Events are stored as immutable records (event sourcing)
-Projectors process events asynchronously via queues
-Read models are updated and cached for fast access
-Livewire components consume cached data and update the UI in real time
-Why this approach?
-Strong data consistency
-Easy event replay and recalculation
-High performance under load
-Clear separation between write and read models

---

⚙️ Technology Stack

Backend

-Laravel 12
-Event Sourcing
-Queues (asynchronous event handling)
-Cache layer (Redis / file / database)

Frontend

-Livewire 3.6 – Server-driven reactivity
-Alpine.js – Lightweight UI interactions
-Tailwind CSS v4 – Utility-first styling
-Tooling
-Vite – Asset bundling

Composer – PHP dependency management

NPM – Frontend dependency management

---

📊 Core Modules

Trade Events
Immutable events representing the trade lifecycle

Projectors
Build and update read models from events

Dashboard
Real-time KPIs and trade listings

Filters
Asset-based filtering using Alpine.js

Caching Layer
Optimized access to projections for high performance

---

🏗️ Installation

Prerequisites

-PHP 8.2 or higher
-Composer
-Node.js and NPM
-Database (MySQL or PostgreSQL)
-Queue driver (database or Redis)
