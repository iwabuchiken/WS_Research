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

def exec
  
  num = 15
#  num = 5
  
  fibonacci_Number_Ratio(num)
  
end

exec

#puts "hi"
