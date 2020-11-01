import knex from 'knex';

const db = knex({
    client: 'mysql',
    connection: {
        host: 'localhost',
        user: 'yulken',
        password: 'q1w2e3',
        database: 'db',
    },
    useNullAsDefault: true,
});

export default db;