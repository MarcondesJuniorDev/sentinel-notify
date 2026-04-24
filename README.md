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
2. Copie `.env.example` para `.env` e ajuste as variáveis conforme necessário
3. Execute `docker compose up -d` para subir todos os serviços (app, db, redis, mailpit, nginx)
4. Rode as migrations: `docker compose exec app php artisan migrate`
5. (Opcional) Rode o worker da fila: `docker compose exec app php artisan queue:work`
6. Acesse `http://localhost:8000`

## 📦 Estrutura de Pastas
```
src/
	Domain/                  # Contratos e entidades de domínio
	Infrastructure/Providers # Implementações dos providers (Log, Email, SMS, WhatsApp, etc)
	Application/             # Casos de uso e DTOs
app/Jobs                   # Jobs para envio assíncrono
app/Providers              # Service Providers do Laravel
app/Http/Controllers       # Controllers de API
```

## 🔌 Providers disponíveis
- log (default)
- email
- sms
- whatsapp
- slack
- telegram
- webhook

Basta alterar a variável `NOTIFICATION_PROVIDER` no `.env` para selecionar o provider desejado.

## 🧪 Testes automatizados
Execute todos os testes:
```sh
docker compose exec app php artisan test
```

## 📲 Exemplo de uso via API

### Usando curl
```sh
curl -X GET "http://localhost:8000/test-notification?to=destinatario@teste.com&message=Mensagem+de+teste"
```

### Usando Postman
1. Método: GET
2. URL: `http://localhost:8000/test-notification`
3. Params:
	 - `to`: destinatário (e-mail, número, canal, url, etc)
	 - `message`: mensagem a ser enviada

### Exemplo de resposta
```json
{
	"status": "Notificação enviada para fila",
	"to": "destinatario@teste.com",
	"message": "Mensagem de teste"
}
```

## 💡 Como adicionar um novo provider
1. Crie uma classe em `src/Infrastructure/Providers` implementando `NotificationProviderInterface`
2. Adicione o provider no `NotificationServiceProvider`
3. Use o nome do provider na variável `NOTIFICATION_PROVIDER` do `.env`

## 🤝 Contribuição
Pull requests são bem-vindos! Sinta-se à vontade para abrir issues ou sugerir melhorias.

---
Projeto para fins de portfólio e demonstração de arquitetura moderna com Laravel, Docker e Clean Architecture.
