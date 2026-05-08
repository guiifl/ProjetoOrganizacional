# ProjetoOrganizacional

Sistema web para organização de estudos focados em provas de estudantes de uma instituição especifíca (Escola Técnica Estadual Oscar Tenório), permitindo gerenciar matérias, níveis de dificuldade e horários disponíveis.

## Funcionalidades

* Autenticação de usuários (login/logout)
* Cadastro de matérias
* Definição de dificuldade (Fácil, Médio, Difícil)
* Cadastro de disponibilidade de horários
* Listagem de dados por usuário
* Validação de conflito de horários
* Redirecionamento automático após login

---

## Como funciona

O sistema permite que cada usuário:

1. Cadastre suas matérias
2. Defina o nível de dificuldade
3. Informe seus horários disponíveis

Esses dados são utilizados como base para organização de estudos.

---

## Autenticação

* Senhas protegidas com `password_hash()`
* Controle de sessão
