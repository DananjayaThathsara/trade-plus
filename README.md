TradePulse — Event-Driven Trading Dashboard

TradePulse is a real-time trading analytics dashboard built with Laravel 12 using an event-sourced architecture.
It provides a scalable and reactive interface for monitoring, filtering, and analyzing trading activity with high performance and strong data integrity.

The application combines server-driven UI updates with event-based state management, delivering real-time insights without the complexity of a traditional SPA.

Key Features

Event-sourced trade lifecycle management

Real-time dashboard updates using Livewire 3.6

Reactive UI interactions powered by Alpine.js

Scalable background processing with queues

Cached projections for fast KPI retrieval

Clean, responsive UI using Tailwind CSS v4

Asset-based filtering and pagination

Production-ready architecture with auditability

Architecture Overview

TradePulse follows a Command → Event → Projection → Cache → UI flow:

Commands trigger domain actions (e.g., trade creation or updates)

Events are stored as immutable records (event sourcing)

Projectors process events asynchronously via queues

Read models are updated and cached for performance

Livewire components consume cached data and update the UI in real time

This separation ensures:

Consistent data

Easy replay and recalculation

High performance under load

Technology Stack
Backend

Laravel 12

Event Sourcing

Queues (asynchronous event handling)

Cache Layer (Redis / file / database)

Frontend

Livewire 3.6 – Server-driven reactivity

Alpine.js – Lightweight UI interactions

Tailwind CSS v4 – Utility-first styling

Tooling

Vite – Asset bundling

Composer – PHP dependency management

NPM – Frontend dependency management

Core Modules

Trade Events – Immutable trade lifecycle events

Projectors – Build and update read models

Dashboard – Real-time KPIs and trade listings

Filters – Asset-based filtering with Alpine.js

Caching Layer – Optimized access to projections

Installation
Prerequisites

PHP 8.2+

Composer

Node.js & NPM

Database (MySQL / PostgreSQL)

Queue driver (database / Redis)
