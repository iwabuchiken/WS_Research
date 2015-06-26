def euclidean_op(a, b, n)

  #REF basename http://ruby-doc.org/core-1.9.3/File.html#method-c-dirname
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] ************************"
  
  
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] a = #{a} / b = #{b} (n = #{n})"
  
  #########################
  # first
  #########################
#  n = 1
  
  c = a - n * b
  
  #########################
  # flag
  #
  # 1   => deduction done
  # 0   => (a-kb) == 0
  # -1  => swapped
  #
  #########################
  flag = 1
  
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] c = #{c} / b = #{b} (n = #{n})"
  
  
#  puts "c = #{c} / b = #{b} (n = #{n})"
  
  # c => less than b ?
  if c == 0
#  if c < b

#    puts "c is 0: b => #{b}"
    puts "[#{File.basename(__FILE__)} : #{__LINE__}] c is 0: b => #{b}"
    
    # flag
    flag = 0
#    flag = -1
     
  # c => 0 ?
  elsif c < b
#  elsif c == 0
    
    # swap c with b
    tmp = c; c = b; b = tmp
    
    #REF multiple lines http://stackoverflow.com/questions/2337510/ruby-can-i-write-multi-line-string-with-no-concatenation answered May 17 '11 at 15:06
    puts "[#{File.basename(__FILE__)} : #{__LINE__}]"\
      " swapped: c = #{c} / b = #{b} (n = #{n})"
    
#    puts "swapped: c = #{c} / b = #{b} (n = #{n})"
   
    # flag
    flag = -1
#    flag = 0
    
  end

  #########################
  # return
  #########################
  return c, b, flag
  
end

def euclidean(a, b)
  
  puts "[#{File.basename(__FILE__)} : #{__LINE__}] a = #{a} / b = #{b}"
  
  #########################
  # first
  #########################
  n = 1

  # result of operation => see def euclidean_op(a, b, n) 
  flag = 1
  
  # init c
  c = a
  
#  c, b, flag = euclidean_op(a, b, n)
#  
#  puts "[#{File.basename(__FILE__)} : #{__LINE__}] op => done"
#  
#  puts "[#{File.basename(__FILE__)} : #{__LINE__}] c = #{c} / b = #{b}"
#  
#  #########################
#  # 2nd
#  #########################
#  n += 1
#
#  c, b = euclidean_op(a, b, n)
##  c, b = euclidean_op(c, b, n)
#  
#  puts "[#{File.basename(__FILE__)} : #{__LINE__}] op => done"
#  
#  puts "[#{File.basename(__FILE__)} : #{__LINE__}] c = #{c} / b = #{b}"
  
  #########################
  # further
  #########################
  count = 0
  
  #REF loop http://stackoverflow.com/questions/136793/is-there-a-do-while-loop-in-ruby answered May 23 '12 at 5:28
  loop do
  
#    #debug
#    count += 1
#    
#    if count > 10
#      
#      break
#      
#    end
      
    # break if => c == 0
    if c == 0
      
      puts "[#{File.basename(__FILE__)} : #{__LINE__}] c => 0"
      
      break;
      
    end#if c == 0
#    break if c == 0
    
    # swapped ?
    if flag == -1
      
      n = 1
      
      # swap a with c; c is now b
      a = c
      
    elsif flag == 0   # b is 0
      
      puts "[#{File.basename(__FILE__)} : #{__LINE__}] (a-kb) is zero"
      
      break
      
    else#if flag == -1
      
      n += 1
      
    end#if flag == -1
    
#    n += 1
  
    # operation
    c, b, flag = euclidean_op(a, b, n)
#    c, b = euclidean_op(c, b, n)
    
    # report
    puts "[#{File.basename(__FILE__)} : #{__LINE__}] op => done"
    
    puts "[#{File.basename(__FILE__)} : #{__LINE__}] c = #{c} / b = #{b}"
    
  end#loop do
  
    
#  c = a - n * b
#  
#  puts "c = #{c} / b = #{b} (n = #{n})"
  
end

a = 1530
b = 33
#b = 27

euclidean(a, b)
