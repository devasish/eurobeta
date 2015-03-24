var Custom = {
    round : function(val, len) {
        var m_f = Math.pow(10,  len);
        
        var y = Math.round((val * m_f)) / m_f;
        
        return y;
    }
}


