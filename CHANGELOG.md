# Changelog

All notable changes to `laracorekit-demo-module` will be documented in this file.

## [1.0.1] - 2026-04-21

### Changed
- Updated Filament support to include versions 3.0, 4.0, and 5.0
- Updated Laravel support documentation to include version 13.0
- Updated Orchestra Testbench to support version 10.0

## [1.0.0] - 2025-12-16

### Added
- Initial release
- Auto-resetting demo environment with configurable intervals
- Laravel Scheduler integration for automatic database resets
- Demo credentials banner for login pages
- Filament admin widget showing demo credentials
- Action blocking middleware for destructive operations
- Domain whitelisting for security
- Media file cleanup on reset
- Cache and session cleanup
- Log rotation (keeps last 7 days)
- Full configuration via .env variables
- Blade components for easy integration
- Support for Laravel 11, 12, and 13
- Support for Filament 3, 4, and 5
- PSR-4 autoloading
- Laravel package auto-discovery
