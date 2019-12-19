const mysql = require("../../nodeMysql/databaseCon");

module.exports = {
    insertUser(email, password) {
        return new Promise((res, rej)=>{
            const pool = mysql.connect();
            const sql = "insert into users (email, password) values (?, ?)";
            pool.query(sql, [email, password], (error, result) => {
            if (error){
            
                rej(error);
            }else{
                res(result);
            }
            mysql.close(pool);
            })
        })
        
    }
}