#include "iostream"
#include "string"
#include "sstream"

using namespace std;
void ToolSelection();
void GETret();
void EXIT();

void GetBMI()
{
	float weight;
	float height; 
	float kg;
	float m;
	float sq;
	float BMI;

	system("pause");
	system("CLS");

	cout << "What is your height in inches: ";
	cin >> height;
	cout << endl;
	cout << "what is you weight in pounds: ";
	cin >> weight;
		cout << endl;
		//cout << "your height is: " << height << " in inches." << endl;
		//cout << "your weight is: " << weight << " in pounds." << endl;

		kg = weight * 0.45;
		m = height * 0.025;
		sq = m * m;
		BMI = kg / sq;

		//cout << "your weight is: " << kg << " in KG." << endl;
		//cout << "your height is: " << sq << " in inches." << endl;
		//cout << "your BMI is: " << BMI << " in inches." << endl;

		// Underweight = <18.5; Normal weight = 18.5–24.9; Overweight = 25–29.9; Obese = BMI of 30 or greater

		if (BMI < 18.5)
		{
			cout << "your BMI is: " << BMI << " You are underweight." << endl;
		}
		else if (BMI >= 18.5 && BMI <= 24.9)
		{
			cout << "your BMI is: " << BMI << " You are Normal." << endl;
		}
		else if (BMI >= 25 && BMI <=29.9)
		{
			cout << "your BMI is: " << BMI << " You are Overweight." << endl;
		}
		else if (BMI >= 30)
		{
			cout << "your BMI is: " << BMI << " You are Obese." << endl;
		}

		system("pause");
		system("CLS");
}

void GETret()
{
	int age;
	int totalage;
	float salary;
	float saved;
	float percentage;
	float total;
	float divtotal; 
	float goal; 
	float done = 0;
	float Etotal;

	system("pause");
	system("CLS");

	cout << "What is your age: ";
	cin >> age;
	cout << endl;
	cout << "What is your annual salary: ";
	cin >> salary;
	cout << endl;
	

	do {

		cout << "What is the percentage you want to save: ";
		cin >> saved;
		cout << endl;

	} while (!(saved > -1 && saved < 101));

	cout << "What is your retirement goal: ";
	cin >> goal;

	percentage = saved / 100;
	total = salary * percentage;
	Etotal = (total * 0.35) + total;
	
	//cout << percentage << endl;
	//cout << total << endl;
	//cout << Etotal << endl;

	int Year = 0;

	while (done <= goal)
	{
		
		if (Year == 0)
		{
			done = Etotal;
			//cout << "in if 0 loop" << endl;
			//cout << "done value: "<< done << endl;
		}
		if (Year > 0)
		{
			done = done + Etotal;
		}

		Year++;
		//cout << "test";
		//cout << "done value: " << done << endl;
	}
	
	totalage = Year + age;
	if (totalage >= 100)
	{
		cout << "Saving goal could not be meet" << endl;
		system("pause");
		system("CLS");
		ToolSelection();
	}
	cout << "Goal value: " << done << " after " << Year << " Years!" << endl << endl;
	cout << "Retirement Age: " << totalage << endl;

	system("pause");
	system("CLS");
}

void EXIT()
{
	system("pause");
	system("CLS");

	cout << "Exiting.....";
	system("pause");
	exit(0);
}

void ToolSelection()
{
	// User input to open a certain function
	int menu = 0;
		
	do {
		cout << "To calculate your BMI type 1: " << endl;
		cout << "To calculate your Retirement TYPE 2: " << endl;
		cout << "To exit the program type 3: " << endl;
		cout << "choice: ";
		cin >> menu;

		if (menu == 1)
		{
			GetBMI();
		}
		else if (menu == 2)
		{
			GETret();
		}
		else if (menu == 3)
		{
			EXIT();
		}
		else 
		{
			cout << "Enter a valid input for a tool you want to use!" << endl;
			system("pause");
			system("CLS");
		}

	} while (menu != 1 || menu != 2 || menu != 3); // Update everytime a new possible commandString is introduced
}

int main()
{
	cout << "BMI/Retierment" << endl;
	cout << "---------------------------------------------------------------------------------------------------" << endl;
	ToolSelection();

	return 0;
}