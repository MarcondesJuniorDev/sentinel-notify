# Sentinel Notify Hub 🚀

Microserviço agnóstico para centralização e gestão de notificações.

## 🏗️ Diferenciais de Arquitetura
- **Clean Architecture:** Separação clara entre domínio, aplicação e infraestrutura.
- **SOLID:** Implementação de padrões para fácil extensão de novos provedores.
- **Resiliência:** Estratégias de retry e mensageria assíncrona com Redis.

## 🛠️ Stack Tecnológica
- **Linguagem:** PHP 8.3
- **Framework:** Laravel 13 (API Mode)
- **Cache/Queue:** Redis
- **Banco de Dados:** PostgreSQL
- **Infra:** Docker & Docker Compose

## 🚀 Como rodar o projeto
1. Clone o repositório
2. Execute `make setup` ou `docker-compose up -d`
3. Acesse `http://localhost:8000`
