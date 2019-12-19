const DB = require("./databaseCon");
const table = "student";


const crud = {
    //retrive
    select() {
        return new Promise((resolve, reject) => {
            const pool = DB.connect();
            const sql = `select * from ${table}`;
            pool.query(sql, [], (err, result) => {
                if (err) {
                    console.log(err);
                    reject(err);
                    DB.close(pool);
                } else {
                    console.log(result);
                    resolve(result);
                    DB.close(pool);
                }
            });
        });
    },

    // select();

    //add
    insert(name, age) {
        return new Promise((resolve, reject) => {
            const pool = DB.connect();
            const sql = `insert into ${table} (name, age) values (?, ?)`;
            pool.query(sql, [name, age], (err, result) => {
                if (err) {
                    console.log(err);
                    DB.close(pool);
                    reject(err);

                } else {
                    console.log(result);
                    DB.close(pool);
                    resolve(result);

                }
            });
        });

    },
    // insert();

    

    //update
    update() {
        const pool = DB.connect();
        const sql = `update ${table} set age = ? where name = ?`;
        pool.query(sql, [12, "Gigi"], (err, result) => {
            if (err) {
                console.log(err);
                DB.close(pool);
            } else {
                console.log(result);
                DB.close(pool);
            }
        });
    },

    //update();

    //delete
    del() {
        const pool = DB.connect();
        const sql = `delete from ${table} where name = ?`;
        pool.query(sql, ["Gigi"], (err, result) => {
            if (err) {
                console.log(err);
                DB.close(pool);
            } else {
                console.log(result);
                DB.close(pool);
            }
        });
    }
// del();
    
}

module.exports = crud;



