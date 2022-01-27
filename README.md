Desenvolver um sistema de marcação de consultas. Devemos ter o cadastro das especialidades, dos médicos e dos pacientes. Após, precisamos criar uma consulta associando o paciente ao médico. Um diferencial é poder buscar o médico pelo CRM ou especialidade.

A especialidade deverá ter:

•	Nome da especialidade.


O médico deverá ter:

•	Nome;

•	Especialidade;

•	CRM.


O paciente deverá ser composto por:

•	Nome;

•	CPF;

•	Data/hora de cadastro;

•	Telefone (Quantidade de telefones é variável)

•	E-mail;

•	CEP;

•	Endereço;

•	Número.


A consulta deverá ter:

•	Paciente;

•	Médico;

•	Data e horário da consulta;

•	Data e horário do agendamento.


Regras:

•	O endereço do paciente deve ser trazido de uma API através do CEP. Sugerimos a ViaCEP - Webservice CEP e IBGE gratuito;

•	Caso o paciente tenha menos de 12 anos completos, permitir consultas apenas com a especialidade “pediatria”;

•	Caso o cliente seja menor de idade, pedir o nome e CPF de um responsável.


Observação:

Apenas para conhecimento, seguem as tecnologias que utilizamos nos nossos projetos PHP:
Backend: Composer, Laravel, Zend Framework e Doctrine ORM\ODM;
Frontend: Gulp, NPM, jQuery, ES6, Bootstrap e ReactJS;