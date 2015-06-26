def decimal_system(num)
  
  # show the initial number
  puts "num = #{num}"
  
  # get the digit number
  len = num.to_s.length
  
  # get: x of 10 * x
  b = num / 10
  
  puts "b = #{b}"
  
  # get: remainder => 1st digit from the right
  r1 = num % b
  
  puts "r1 = #{r1}"
  
  # get: second b
  r2 = b % 10
  b2 = b / 10
  
  puts "b2 = #{b2} / r2 = #{r2}"
  
  #get: the third r
  r3 = b2 % 10
  b3 = b2 / 10
  
  puts "b3 = #{b3} / r3 = #{r3}"
  
  # show: n = r1r2r3
  
  puts "num = #{r3} #{r2} #{r1}"
#  puts "num = #{r1} #{r2} #{r3}"
  
end

# p.12
num = 135
#num = 261
decimal_system(num)
