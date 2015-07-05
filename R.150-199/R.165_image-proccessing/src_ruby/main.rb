def expand_Array(data, len)
  
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] data => #{data}"
  
  #########################
  # vars
  #########################
  data_New = Array.new
  
  len_New = 23
#  len_New = 11
#  len_New = 10
  
  quo = len_New / len
  
  resi = len_New - (len * quo)
  
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] 
          len = #{len}, len_New = #{len_New} / quo = #{quo}, resi = #{resi}"  #=> 2

  #########################
  # build: 1st
  #########################
  resi.times do |i|
    
    (quo + 1).times do |j|
      
      data_New << data[i]
      
    end
    
  end
  
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] data_New => #{data_New}"
  
  #########################
  # build: the rest
  #########################
  offset = resi
#  offset = (quo + 1) * resi
  
  (len - offset).times do |i|
    
    quo.times do |j|
      
      data_New << data[i + offset]
      
    end
    
  end        
  
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] data_New => #{data_New}"
  
end#def expand_Array(data, len)

def exec
  
  data = [1,2,3,4]
  
  len = data.length;
  
  expand_Array(data, len)
  
end

exec
