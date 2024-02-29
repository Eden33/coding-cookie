## Coding Cookie Project

Coding Cookie: https://www.codingcookie.com

## Development

1. docker compose up
2. Copy manually:
- `wp-content\themes\catch-box` to `wordpress\wp-content\themes\catch-box`
- `wp-content\themes\coding-cookie` to `wordpress\wp-content\themes\coding-cookie`
- `wp-content\uploads\` to `wordpress\wp-content\uploads\`
- `wp-content\plugins\` to `wordpress\wp-content\plugins\`
3. Take mysql dump from live website that includes `drop table procedure in case exists` in the dump file.
4. In the dump file:
- replace www.codingcookie.com with localhost:8080
- replace https with http
5. Import modified dump file http://localhost:8180/
6. Open website: http://localhost:8080
7. Active the plugins you want to include into testing: http://localhost:8080\wp-admin
