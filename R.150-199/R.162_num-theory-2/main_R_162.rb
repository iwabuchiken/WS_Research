def fibonacci_Number_Ratio(num)
  
  a = [1,1]
  
  num.times do
    
    a << (a[-2] + a[-1])
      
  end
  
#  a << (a[-2] + a[-1]) 
  
  a.each {|elem|
    
    print elem,","
        
  }

  puts
  
  #########################
  # fractions
  #########################
  fracs = Array.new
  
  (a.length - 1).times do |i|
    
    fracs << ((a[i+1].to_f/a[i]))
    
  end#(a-1).times do |i|

  fracs.each {|elem|
    
    puts elem
#    print elem,","
        
  }

  #########################
  # fractions: "next-but-one"
  #########################
  fracs = Array.new
  
  (a.length - 2).times do |i|
      
      fracs << ((a[i].to_f/a[i+2]))
      
    end#(a-1).times do |i|
  
    fracs.each {|elem|
      
      puts elem
  #    print elem,","
          
    }
  
    
end

def gen_CF(a, b)

  # continued fraction
  cf = Array.new

  # dividend, divisor    
  dividend = a; divisor = b
  
  # quo
  quo = dividend / divisor

  # first member  
  cf << "#{quo};"

  # remainder  
  rem = dividend - (divisor * quo)
  
  # validate
  if rem == 0

    return cf
    
  end
          
  #########################
  # further
  #########################
  while rem != 0
    
    dividend = divisor
    
    divisor = rem
    
    quo = dividend / divisor

    unless quo == 0
      
      cf << quo
      
    end
        
    rem = dividend - (divisor * quo)
    
    # validate
    if rem == 0
      
      break
    
    end

  end#while rem != 0

  #########################
  # return cf
  #########################
  return cf
    
end#gen_CF

#########################
# REF http://www.maths.surrey.ac.uk/hosted-sites/R.Knott/Fibonacci/cfINTRO.html#section3.1.1 4 Continued Fractions and Euclid's
#########################
def GCD_Algo

  # continue fraction
  a = 720; b = 168
  
  cf = gen_CF(a, b)
##  cf = Array.new
#    
#  dividend = 720; divisor = 168
#  
##  dividend = 168
##  dividend = 160
##  dividend = 40
##  dividend = 48
##  dividend = 103
##  dividend = 45
##  168/720
##  divisor = 720
#  
#  quo = dividend / divisor
##  quo = 45 / 16
#  
#  # put a member of cf
##  cf << "#{quo};"
##  unless quo == 0
#    
##    cf << quo
#    cf << "#{quo};"
#    
##  end
#
#  
#  rem = dividend - (divisor * quo)
#  
#  printf "[#{File.basename(__FILE__)} : #{__LINE__}] %d = %d x %d + %d\n", 
#          dividend, quo, divisor, rem
#
#  # validate
#  if rem == 0
#    
#    puts "[#{File.basename(__FILE__)} : #{__LINE__}] rem is 0; divisor = #{divisor}\n"
##    puts "[#{File.basename(__FILE__)} : #{__LINE__}] rem is 0; quo = #{quo}\n"
#    
##  elsif
##    
##    cf << rem
##    
#  end
#          
##  #########################
##  # 2nd
##  #########################
##  dividend = divisor
##  
##  divisor = rem
##  
##  quo = dividend / divisor
##  
##  rem = dividend - (divisor * quo)
##  
##  printf "[#{File.basename(__FILE__)} : #{__LINE__}] %d = %d x %d + %d\n", 
##            dividend, quo, divisor, rem
##
##  # validate
##  if rem == 0
##    
##    puts "[#{File.basename(__FILE__)} : #{__LINE__}] rem is 0; quo = #{quo}\n"
##    
##  end
#  
#  #########################
#  # further
#  #########################
#  while rem != 0
#    
#    dividend = divisor
#    
#    divisor = rem
#    
#    quo = dividend / divisor
#
#    unless quo == 0
#      
#      cf << quo
#      
#    end
#        
#    rem = dividend - (divisor * quo)
#    
#    printf "[#{File.basename(__FILE__)} : #{__LINE__}] %d = %d x %d + %d\n", 
#              dividend, quo, divisor, rem
#  
#    # validate
#    if rem == 0
#      
#      puts "[#{File.basename(__FILE__)} : #{__LINE__}] rem is 0; divisor = #{divisor}\n"
##      puts "[#{File.basename(__FILE__)} : #{__LINE__}] rem is 0; quo = #{quo}\n"
#
#      break
#    
##    elsif
##      
##      cf << rem
##        
#    end
#    
#  end#while rem != 0
  
  #########################
  # report
  #########################
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] 
          a = #{a}, b = #{b} / cf => #{cf}"
  
end#GCD_Algo

def exec
  
  num = 15
#  num = 5

  GCD_Algo();  
#  fibonacci_Number_Ratio(num)
  
end

exec

#puts "hi"
