function convertDateMysql(){
    const hoy = new Date()
    const hoyIso= hoy.toISOString()
    
    let date= hoyIso.split(/T/)[0]
    const dateMysql= `${date} ${hoy.toLocaleTimeString()}`
    
    
    
    
    return dateMysql
    }