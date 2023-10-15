import java.util.*;
import java.util.Scanner;
public class lista_tarefas{
    public static void main(String[] args){
        Scanner scn = new Scanner(System.in);
        System.out.print("PROGRAMA DE TAREFAS");
        System.out.println("\n-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-");
        System.out.print("obs: evite colocar espaço na hora de escrever suas tarefas!");
        System.out.println("\nOPÇÕES\n1 - adicionar tarefas\n2 - encerrar o programa");
        int op = scn.nextInt();
         System.out.println("\n-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-");
         List<String> afazeres = new ArrayList<String>();
        while(true){
            if(op == 1){
            System.out.print("\nAdicione afazeres:\n");
            String af = scn.next();
            afazeres.add(af);
            System.out.println("\nSe deseja continuar digite 1\nCaso não, digite 2.");
            op = scn.nextInt();
            } 
            else if(op == 2){
                System.out.print("Seus afazeres são: ");
                System.out.print(afazeres);
                break;
            }
        }
    }
}
