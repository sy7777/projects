const mySQL = require("mysql");

module.exports = {
    connect() {
        const pool = mySQL.createPool({
            "host": "localhost",
            "user": "root",
            password: "Suiyuqi77",
            port: "3306",
            database: "learning"
        })
        return pool;
    },
    close(pool) {
        try {
            pool.end();
            console.log(`Succeed to close`)
        } catch (e) {
            console.log(`Failed to close ${e.message}`)
        }

    }
}