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

#########################
# expand_Array_2
#  use x,y
#########################
def expand_Array_2(data, len, x, y)
  
  #########################
  # vars
  #########################
  len_Max = (x + y) - 1
  
  # quotient
#  quo = 4
#  quo = 3
#  quo = 2
  quo = len_Max / len
  
  # residue
  resi = len_Max - (len * quo)
  
  # new data
  data_New = Array.new(x * y);
  
  #debug
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] 
            len = #{len}, x = #{x}, y = #{y}
            quo = #{quo}, resi = #{resi}
            data_New.length => #{data_New.length}"
  
  #########################
  # build: residue length => quo + 1
  #########################
  j = 1 # counter
  
#  10.times do |i|
  data_New.length.times do |i|
    
    data_New[i] = j
#    data_New[i] = i
#    data_New.push(i)
#    data_New << i
#    data_New << j
    
    # increment j
    if i != 0 and i % quo == (quo - 1)
#    if i != 0 and i % quo == 1
#    if i != 1 and i % quo == 1
#    if i != 0 and i != 1 and i % quo == 1
#    if i != 0 and i % quo == 1
#    if i % quo == 0
      
      j = j + 1
      
    end
    
  end
  
  #debug
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] data_New => #{data_New[0..100]}"
#  puts "[#{File.basename(__FILE__)} : #{__LINE__}] data_New => #{data_New[0..10]}"
  
end#def expand_Array(data, len)

#########################
# modify expand_Array_2
#  use x,y
#########################
def expand_Array_3(data, len, x, y)
  
  #########################
  # vars
  #########################
#  data = [1,2,3,4]
  
#  len_Max = 122
  
#  len = 4
  
#  len_Max = 14
  len_Max = (x + y) - 1
  
#  quo = 3
  quo = len_Max / len
  
  # residue
#  resi = 2
  resi = len_Max - (len * quo)
  
  # new data
#  data_New = Array.new(len_Max)
#  data_New = Array.new(14)
#  data_New = Array.new(x * y)
  
  #debug
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] 
            len = #{len}, x = #{x}, y = #{y}
            quo = #{quo}, resi = #{resi}
            data_New.length => #{data_New.length}"
  
  #########################
  # build: residue length => quo + 1
  #########################
  j = 0 # counter
  
  cnt = 0
  
  #########################
  # build: +1 items
  #########################
  resi.times do |i|
    
    (quo + 1).times do |k|
      
      data_New[cnt] = data[j]
      
      cnt = cnt + 1
      
    end#(quo + 1).times.do |k|
    
    # increment j
    j = j + 1
    
  end#resi.times do |i|

  #########################
  # build: quo items
  #########################
  data[resi..-1].length.times do |i|
  
    quo.times do |k|
      
      data_New[cnt] = data[resi + i]
      
      cnt = cnt + 1
      
    end#quo.times do |k|
    
    j = j + 1
    
  end#data[resi..-1].length.times do |i|
  
  
  
  #debug
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] data_New => #{data_New}"
#  puts "[#{File.basename(__FILE__)} : #{__LINE__}] data_New => #{data_New[0..10]}"
  
end#def expand_Array(data, len)

def exec
  
  #REF http://stackoverflow.com/questions/4908413/how-to-initialize-an-array-in-one-step-using-ruby answered Feb 5 '11 at 17:43
  data = (1..255).to_a
#  data = [1,2,3,4]
  
  len = data.length;

  # x and y of the new image data
  x = 480
  y = 400

  #debug
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] data => #{data}"
  
      
  expand_Array_3(data, len, x, y)
#  expand_Array_2(data, len, x, y)
#  expand_Array(data, len)
  
end

exec
